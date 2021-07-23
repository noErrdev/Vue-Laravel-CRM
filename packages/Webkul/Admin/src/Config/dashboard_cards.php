<?php

return [
    [
        "selected"      => true,
        "card_id"       => "leads",
        "sort"          => 1,
        "card_type"     => "bar_chart",
        "view_url"      => "admin.leads.index",
        "label"         => 'admin::app.dashboard.leads_over_time',
        // "class_name"    => "Webkul\Admin\Helpers\DashboardHelper",
        // "method_name"   => "getLeads",
    ], [
        "selected"      => true,
        "card_id"       => "leads_started",
        "sort"          => 2,
        "card_type"     => "line_chart",
        "label"         => 'admin::app.dashboard.leads_started',
    ], [
        "selected"      => true,
        "card_id"       => "activities",
        "sort"          => 4,
        "card_type"     => "activities",
        "data_class"    => "display-grid",
        "view_url"      => "admin.activities.index",
        "label"         => 'admin::app.dashboard.activities',
    ], [
        "selected"      => true,
        "card_id"       => "top_leads",
        "sort"          => 3,
        "card_type"     => "top_card",
        "data_class"    => "display-grid",
        "label"         => 'admin::app.dashboard.top_leads',
    ], [
        "selected"      => true,
        "card_id"       => "stages",
        "sort"          => 5,
        "card_type"     => "stages_bar",
        "data_class"    => "display-grid",
        "label"         => 'admin::app.dashboard.stages',
    ], [
        "selected"      => true,
        "card_id"       => "emails",
        "sort"          => 6,
        "card_type"     => "column-grid-2",
        "data_class"    => "column-grid-2",
        "view_url"      => "admin.mail.index",
        "url_params"    => "inbox",
        "label"         => 'admin::app.dashboard.emails',
    ], [
        "selected"      => true,
        "card_id"       => "customers",
        "sort"          => 7,
        "card_type"     => "line_chart",
        "view_url"      => "admin.contacts.persons.index",
        "label"         => 'admin::app.dashboard.customers',
    ], [
        "selected"      => true,
        "card_id"       => "top_customers",
        "sort"          => 8,
        "card_type"     => "column-grid-2",
        "data_class"    => "column-grid-2",
        "label"         => 'admin::app.dashboard.top_customers',
    ], [
        "selected"      => true,
        "card_id"       => "products",
        "sort"          => 9,
        "card_type"     => "line_chart",
        "view_url"      => "admin.products.index",
        "label"         => 'admin::app.dashboard.products',
    ], [
        "selected"      => true,
        "card_id"       => "top_products",
        "sort"          => 10,
        "card_type"     => "column-grid-2",
        "data_class"    => "column-grid-2",
        "label"         => 'admin::app.dashboard.top_products',
    ], [
        "sort"          => 10,
        "selected"      => true,
        "card_id"       => "quotes",
        "card_type"     => "line_chart",
        "label"         => 'admin::app.dashboard.quotes',
    ], [
        "sort"          => 11,
        "card_type"     => "custom_card",
        "card_border"   => "dashed",
        "selected"      => false,
    ]
];

?>