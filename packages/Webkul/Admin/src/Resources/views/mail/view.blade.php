@extends('admin::layouts.master')

@section('page_title')
    {{ $email->subject }}
@stop

@section('content-wrapper')

    @php
        if (! $email->lead) {
            $email->lead = app('\Webkul\Lead\Repositories\LeadRepository')->getModel()->fill(['title' => $email->subject]);
        }
    @endphp

    <div class="content full-page">
        <div class="page-header">
            <div class="page-title">
                <h1>{{ $email->subject }}</h1>
            </div>

            <div class="page-action">

                <email-action-component></email-action-component>

            </div>
        </div>

        <div class="page-content" style="margin-top: 30px;">

            <email-list-component></email-list-component>

        </div>
    </div>
@stop

@push('scripts')

    <script src="{{ asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js') }}"></script>

    <script type="text/x-template" id="email-action-component-template">
        <div class="email-action-container">
            <button class="btn btn-sm btn-secondary-outline" @click="show_filter = ! show_filter">
                <i class="icon link-icon"></i>
                <span>{{ __('admin::app.mail.link-mail') }}</span>
            </button>

            <div class="sidebar-filter" :class="{show: show_filter}">
                <header>
                    <h1>
                        <span>{{ __('admin::app.mail.link-mail') }}</span>

                        <div class="float-right">
                            <i class="icon close-icon" @click="show_filter = ! show_filter"></i>
                        </div>
                    </h1>
                </header>

                <div class="email-action-content">
                    <div class="panel link-person">
                        <h3>{{ __('admin::app.mail.link-mail') }}</h3>

                        <div class="btn-group">
                            <button class="btn btn-sm btn-primary-outline" v-if="! enabled_search.contact" @click="enabled_search.contact = true">{{ __('admin::app.mail.add-to-existing-contact') }}</button>

                            <div class="form-group" v-else>
                                <input class="control" v-model="search_term.contact" v-on:keyup="search('contact')" placeholder="{{ __('admin::app.mail.search-contact') }}"/>

                                <div class="lookup-results" v-if="search_term.contact.length">
                                    <ul>
                                        <li v-for='(result, index) in search_results.contact'>
                                            <span>@{{ result.name }}</span>
                                        </li>
            
                                        <li v-if='! search_results.contact.length && search_term.contact.length && ! is_searching.contact'>
                                            <span>{{ __('admin::app.common.no-result-found') }}</span>
                                        </li>
                                    </ul>
                                </div>

                                <i class="icon close-icon"  v-if="! is_searching.contact" @click="enabled_search.contact = false; reset('lead')"></i>

                                <i class="icon loader-active-icon" v-if="is_searching.contact"></i>
                            </div>
                            <button class="btn btn-sm btn-primary">{{ __('admin::app.mail.create-new-contact') }}</button>
                        </div>
                    </div>

                    <div class="panel link-lead">
                        <h3>Link Lead</h3>

                        <div class="btn-group">
                            <button class="btn btn-sm btn-primary-outline" v-if="! enabled_search.lead" @click="enabled_search.lead = true">{{ __('admin::app.mail.link-to-existing-lead') }}</button>

                            <div class="form-group" v-else>
                                <input class="control" v-model="search_term.lead" v-on:keyup="search('lead')" placeholder="{{ __('admin::app.mail.search-lead') }}"/>

                                <div class="lookup-results" v-if="search_term.lead.length">
                                    <ul>
                                        <li v-for='(result, index) in search_results.lead'>
                                            <span>@{{ result.title }}</span>
                                        </li>
            
                                        <li v-if='! search_results.lead.length && search_term.lead.length && ! is_searching.lead'>
                                            <span>{{ __('admin::app.common.no-result-found') }}</span>
                                        </li>
                                    </ul>
                                </div>

                                <i class="icon close-icon"  v-if="! is_searching.lead" @click="enabled_search.lead = false; reset('lead')"></i>

                                <i class="icon loader-active-icon" v-if="is_searching.lead"></i>
                            </div>

                            <button class="btn btn-sm btn-primary">{{ __('admin::app.mail.add-new-lead') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="text/x-template" id="email-list-component-template">
        <div class="email-list">
            <email-item-component
                :email="email"
                :key="0"
                :index="0"
                @onEmailAction="emailAction($event)">
            </email-item-component>


            <div class="email-reply-list">
                <email-item-component
                    v-for='(email, index) in email.emails'
                    :email="email"
                    :key="0"
                    :index="0"
                    @onEmailAction="emailAction($event)">
                </email-item-component>
            </div>

            <div class="email-action" v-if="! action">
                <span class="reply-button" @click="emailAction({'type': 'reply'})">
                    <i class="icon reply-icon"></i>
                    {{ __('admin::app.mail.reply') }}
                </span>

                <span class="forward-button" @click="emailAction({'type': 'forward'})">
                    <i class="icon forward-icon"></i>
                    {{ __('admin::app.mail.forward') }}
                </span>
            </div>

            <div class="email-form-container" id="email-form-container" v-else>
                <email-form
                    :action="action"
                    @onDiscard="discard($event)"
                ></email-form>
            </div>
        </div>
    </script>

    <script type="text/x-template" id="email-item-component-template">
        <div class="email-item">
            <div class="email-header">
                <div class="row">
                    <span class="label">
                        {{ __('admin::app.mail.from-') }}
                    </span>

                    <span class="value">
                        @{{ email.name + ' ' + email.from }}
                    </span>

                    <span class="time">
                        <timeago :datetime="email.created_at" :auto-update="60"></timeago>

                        <span class="icon ellipsis-icon dropdown-toggle"></span>

                        <div class="dropdown-list">
                            <div class="dropdown-container">
                                <ul>
                                    <li @mouseover="hovering = 'reply-white-icon'" @mouseout="hovering = ''" @click="emailAction('reply')">
                                        <i class="icon reply-icon" :class="{'reply-white-icon': hovering == 'reply-white-icon'}"></i>
                                        {{ __('admin::app.mail.reply') }}
                                    </li>
                                    <li @mouseover="hovering = 'reply-all-white-icon'" @mouseout="hovering = ''" @click="emailAction('reply-all')">
                                        <i class="icon reply-all-icon" :class="{'reply-all-white-icon': hovering == 'reply-all-white-icon'}"></i>
                                        {{ __('admin::app.mail.reply-all') }}
                                    </li>
                                    <li @mouseover="hovering = 'forward-white-icon'" @mouseout="hovering = ''" @click="emailAction('forward')">
                                        <i class="icon forward-icon" :class="{'forward-white-icon': hovering == 'forward-white-icon'}"></i>
                                        {{ __('admin::app.mail.forward') }}
                                    </li>
                                    <li @mouseover="hovering = 'trash-white-icon'" @mouseout="hovering = ''" @click="emailAction('delete')">
                                        <form :action="'{{ route('admin.mail.delete') }}/' + email.id" method="post" :ref="'form-' + email.id">
                                            @csrf()
                                            <input type="hidden" name="_method" value="DELETE"/>
                                            <i class="icon trash-icon" :class="{'trash-white-icon': hovering == 'trash-white-icon'}"></i>
                                            {{ __('admin::app.mail.delete') }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </span>
                </div>

                <div class="row">
                    <span class="label">
                        {{ __('admin::app.mail.to-') }}
                    </span>

                    <span class="value">
                        @{{ String(email.reply_to) }}
                    </span>
                </div>
                
                <div class="row" v-if="email.cc.length">
                    <span class="label">
                        {{ __('admin::app.mail.cc-') }}
                    </span>

                    <span class="value">
                        @{{ String(email.cc) }}
                    </span>
                </div>
                
                <div class="row" v-if="email.bcc.length">
                    <span class="label">
                        {{ __('admin::app.mail.bcc-') }}
                    </span>

                    <span class="value">
                        @{{ String(email.bcc) }}
                    </span>
                </div>
            </div>

            <div class="email-content">
                <div v-html="email.reply"></div>

                <div class="attachment-list">
                    <div class="attachment-item" v-for='(attachment, index) in email.attachments'>
                        <a :href="'{{ route('admin.mail.attachment_download') }}/' + attachment.id">
                            <i class="icon attachment-icon"></i>
                            @{{ attachment.name }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="text/x-template" id="email-form-template">
        <form method="POST" action="{{ route('admin.mail.store') }}" enctype="multipart/form-data" @submit.prevent="onSubmit">

            <div class="form-container">

                <div class="panel">
    
                    <div class="panel-body">
                        @csrf()

                        <input type="hidden" name="parent_id" :value="action.email.id"/>

                        @include ('admin::common.custom-attributes.edit.email-tags')

                        <div class="form-group" :class="[errors.has('reply_to[]') ? 'has-error' : '']">
                            <label for="to" class="required">{{ __('admin::app.leads.to') }}</label>
    
                            <email-tags-component control-name="reply_to[]" control-label="{{ __('admin::app.leads.to') }}" :validations="'required'" :data="reply_to"></email-tags-component>
    
                            <span class="control-error" v-if="errors.has('reply_to[]')">@{{ errors.first('reply_to[]') }}</span>
                        </div>
    
                        <div class="form-group" :class="[errors.has('cc[]') ? 'has-error' : '']">
                            <label for="cc">{{ __('admin::app.leads.cc') }}</label>
    
                            <email-tags-component control-name="cc[]" control-label="{{ __('admin::app.leads.cc') }}" :data='cc'></email-tags-component>
    
                            <span class="control-error" v-if="errors.has('cc[]')">@{{ errors.first('cc[]') }}</span>
                        </div>
    
                        <div class="form-group" :class="[errors.has('bcc[]') ? 'has-error' : '']">
                            <label for="bcc">{{ __('admin::app.leads.bcc') }}</label>
    
                            <email-tags-component control-name="bcc[]" control-label="{{ __('admin::app.leads.bcc') }}" :data='bcc'></email-tags-component>
    
                            <span class="control-error" v-if="errors.has('bcc[]')">@{{ errors.first('bcc[]') }}</span>
                        </div>
                        
                        <div class="form-group" :class="[errors.has('reply') ? 'has-error' : '']">
                            <label for="reply" class="required" style="margin-bottom: 10px">{{ __('admin::app.leads.reply') }}</label>
                            <textarea v-validate="'required'" class="control" id="reply" name="reply" data-vv-as="&quot;{{ __('admin::app.leads.reply') }}&quot;">@{{ reply }}</textarea>
                            <span class="control-error" v-if="errors.has('reply')">@{{ errors.first('reply') }}</span>
                        </div>
    
                        <div class="form-group">
                            <attachment-wrapper></attachment-wrapper>
                        </div>
                    </div>

                    <div class="panel-bottom">
                        <button type="submit" class="btn btn-md btn-primary">
                            <i class="icon email-send-icon"></i>
    
                            {{ __('admin::app.mail.send') }}
                        </button>
    
                        <label @click="discard">{{ __('admin::app.mail.discard') }}</label>
                    </div>
                </div>

            </div>

        </form>
    </script>

    <script>
        Vue.component('email-action-component', {

            template: '#email-action-component-template',

            inject: ['$validator'],

            data: function () {
                return {
                    show_filter: true,

                    is_searching: {
                        contact: false,

                        lead: false
                    },

                    search_term: {
                        contact: '',

                        lead: '',
                    },

                    search_route: {
                        contact: "{{ route('admin.contacts.persons.search') }}",

                        lead: "{{ route('admin.leads.search') }}",
                    },

                    search_results: {
                        contact: [],

                        lead: [],
                    },

                    enabled_search: {
                        contact: false,

                        lead: false,
                    }
                }
            },

            methods: {
                search: debounce(function (type) {
                    this.is_searching[type] = true;

                    if (this.search_term[type].length < 2) {
                        this.search_results[type] = [];

                        this.is_searching[type] = false;

                        return;
                    }

                    this.$http.get(this.search_route[type], {params: {query: this.search_term[type]}})
                        .then (response => {
                            this.search_results[type] = response.data;

                            this.is_searching[type] = false;
                        })
                        .catch (error => {
                            this.is_searching[type] = false;
                        })
                }, 500),

                reset: function(type) {
                    this.search_term[type] = '';

                    this.search_results[type] = [];

                    this.is_searching[type] = false;
                }
            }
        });

        Vue.component('email-list-component', {

            template: '#email-list-component-template',

            props: ['data'],

            inject: ['$validator'],

            data: function () {
                return {
                    email: @json($email),

                    action: null,
                }
            },

            methods: {
                emailAction: function(event) {
                    this.action = event;

                    if (! this.action.email) {
                        this.action.email = this.lastEmail();
                    }

                    var self = this;

                    setTimeout(function() {
                        self.scrollBottom();
                    }, 0);
                },

                scrollBottom: function() {
                    var scrollBottom = $(window).scrollTop() + $(window).height();

                    $('html, body').scrollTop(scrollBottom);
                },

                lastEmail: function() {
                    if (this.email.emails === undefined || ! this.email.emails.length) {
                        return this.email;
                    }

                    return this.email.emails[this.email.emails.length - 1];
                },

                discard: function() {
                    this.action = null;
                }
            },
        });

        Vue.component('email-item-component', {

            template: '#email-item-component-template',

            props: ['index', 'email'],

            inject: ['$validator'],

            data: function () {
                return {
                    hovering: '',
                }
            },

            methods: {
                emailAction: function(type) {
                    if (type != 'delete') {
                        this.$emit('onEmailAction', {'type': type, 'email': this.email});
                    } else {
                        this.$refs['form-' + this.email.id].submit()
                    }
                },
            }
        });

        Vue.component('email-form', {

            template: '#email-form-template',

            props: ['action'],

            inject: ['$validator'],

            data: function () {
                return {

                }
            },

            computed: {
                reply_to: function() {
                    if (this.action.type == 'forward') {
                        return [];
                    }

                    return [this.action.email.from];
                },

                cc: function() {
                    if (this.action.type != 'reply-all') {
                        return [];
                    }

                    return this.action.email.cc;
                },

                bcc: function() {
                    if (this.action.type != 'reply-all') {
                        return [];
                    }

                    return this.action.email.bcc;
                },

                reply: function() {
                    if (this.action.type == 'forward') {
                        return this.action.email.reply;
                    }

                    return '';
                }
            },

            mounted: function() {
                tinymce.remove('#reply');

                tinymce.init({
                    selector: 'textarea#reply',
                    height: 200,
                    width: "100%",
                    plugins: 'image imagetools media wordcount save fullscreen code table lists link hr',
                    toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor link hr | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent  | removeformat | code | table',
                    image_advtab: true
                });
            },

            methods: {
                onSubmit: function(e) {
                    this.$validator.validateAll().then(function (result) {
                        if (result) {
                            e.target.submit();
                        }
                    });
                },

                discard: function() {
                    this.$emit('onDiscard');
                }
            }
        });
    </script>
@endpush