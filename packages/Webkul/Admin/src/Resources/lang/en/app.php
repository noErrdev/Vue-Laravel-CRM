<?php
    return [
        'layouts' => [
            'dashboard'     => 'Dashboard',
            'leads'         => 'Leads',
            'contacts'      => 'Contacts',
            'persons'       => 'Persons',
            'organizations' => 'Organizations',
            'products'      => 'Products',
            'settings'      => 'Settings',
            'roles'         => 'Roles',
            'users'         => 'Users',
            'attributes'    => 'Attributes',
            'my-account'    => 'My Account',
            'sign-out'      => 'Sign Out',
            'back'          => 'Back',
            'name'          => 'Name',
        ],

        'contacts' => [
            'organizations' => [
                'title'          => 'Organizations',
                'add-title'      => 'Add Organization',
                'edit-title'     => 'Edit Organization',
                'save-btn-title' => 'Save as Organization',
                'back'           => 'Back',
                'cancel'         => 'Cancel',
                'create-success' => 'Organization created successfully.',
                'update-success' => 'Organization updated successfully.',
                'delete-success' => 'Organization deleted successfully.',
                'delete-failed'  => 'Organization can not be deleted.',
            ],

            'persons' => [
                'title'          => 'Persons',
                'add-title'      => 'Add Person',
                'edit-title'     => 'Edit Person',
                'save-btn-title' => 'Save as Person',
                'back'           => 'Back',
                'cancel'         => 'Cancel',
                'create-success' => 'Person created successfully.',
                'update-success' => 'Person updated successfully.',
                'delete-success' => 'Person deleted successfully.',
                'delete-failed'  => 'Person can not be deleted.',
            ],
        ],

        'leads' => [
            'title'           => 'Leads',
            'add-title'       => 'Add Lead',
            'edit-title'      => 'Edit Lead',
            'save-btn-title'  => 'Save as Lead',
            'back'            => 'Back',
            'cancel'          => 'Cancel',
            'details'         => 'Details',
            'contact-person'  => 'Contact Person',
            'name'            => 'Name',
            'email'           => 'Email',
            'contact-numbers' => 'Contact Numbers',
            'organization'    => 'Organization',
            'address'         => 'Address',
            'products'        => 'Products',
            'item'            => 'Item',
            'price'           => 'Price',
            'quantity'        => 'Quantity',
            'amount'          => 'Amount',
            'create-success'  => 'Lead created successfully.',
            'update-success'  => 'Lead updated successfully.',
            'delete-success'  => 'Lead deleted successfully.',
            'delete-failed'   => 'Lead can not be deleted.',
        ],

        'products' => [
            'title'          => 'Products',
            'add-title'      => 'Add Product',
            'edit-title'     => 'Edit Product',
            'save-btn-title' => 'Save as Product',
            'back'           => 'Back',
            'cancel'         => 'Cancel',
            'create-success' => 'Product created successfully.',
            'update-success' => 'Product updated successfully.',
            'delete-success' => 'Product deleted successfully.',
            'delete-failed'  => 'Product can not be deleted.',
        ],

        'sessions' => [
            'login' => [
                'title'             => 'Login',
                'welcome'           => 'Welcome Back',
                'email'             => 'Email',
                'password'          => 'Password',
                'login'             => 'Login',
                'forgot-password'   => 'Forgot Password?',
                'login-error'       => 'Please check your credentials and try again.'
            ],

            'forgot-password' => [
                'title'                     => 'Forgot Password ?',
                'email'                     => 'Email',
                'send-reset-password-email' => 'Send Reset Password Email',
                'reset-link-sent'           => 'We have e-mailed your reset password link.',
                'email-not-exist'           => "We can not find a user with this e-mail address.",
                'back-to-login'             => 'Back to login'
            ],

            'reset-password' => [
                'title'             => 'Reset Password',
                'email'             => 'Email',
                'password'          => 'Password',
                'confirm-password'  => 'Confirm Password',
                'reset-password'    => 'Reset Password'
            ]
        ],

        'settings' => [
            'roles' => [
                'title'             => 'Roles',
                'role'              => 'Role',
                'edit_role'         => 'Edit Role',
                'description'       => 'Description',
                'create_role'       => 'Create Role',
                'permission_type'   => 'Permission type',
                'custom'            => 'Custom',
                'all'               => 'All',
                'save-btn-title'    => 'Save as Role',
                'update-btn-title'  => 'Update Role',
                'create-success'    => 'Role created successfully.',
                'update-success'    => 'Role updated successfully.',
                'delete-success'    => 'Role deleted successfully.',
                'delete-failed'     => 'Role can not be deleted.',
                'user-define-error' => 'Can not delete system role.',
                'being-used'        => 'Role can not be deleted, as this is being used in admin user.',
                'last-delete-error' => 'At least one role is required.'
            ],

            'users' => [
                'title'                 => 'Users',
                'create_user'           => 'Create User',
                'edit_user'             => 'Edit User',
                'name'                  => 'Name',
                'email'                 => 'Email',
                'back'                  => 'Back',
                'password'              => 'Password',
                'role'                  => 'Role',
                'status'                => 'Status',
                'save-btn-title'        => 'Save as User',
                'update-btn-title'      => 'Update User',
                'confirm_password'      => 'Confirm password',
                'create-success'        => 'User created successfully.',
                'update-success'        => 'User updated successfully.',
                'delete-success'        => 'User deleted successfully.',
                'delete-failed'         => 'User can not be deleted.',
                'user-define-error'     => 'Can not delete system user.',
                'last-delete-error'     => 'At least one user is required.',
                'user-define-error'     => 'Can not delete system user.',
                'mass-update-success'   => 'Users updated successfully.',
                'mass-destroy-success'  => 'Users deleted successfully.',
            ],

            'attributes' => [
                'title'                 => 'Attributes',
                'attribute'             => 'Attribute',
                'add-title'             => 'Add Attribute',
                'edit-title'            => 'Edit Attribute',
                'save-btn-title'        => 'Save as Attribute',
                'back'                  => 'Back',
                'code'                  => 'Code',
                'name'                  => 'Name',
                'type'                  => 'Type',
                'text'                  => 'Text',
                'textarea'              => 'Textarea',
                'price'                 => 'Price',
                'boolean'               => 'Boolean',
                'select'                => 'Select',
                'multiselect'           => 'Multiselect',
                'email'                 => 'Email',
                'address'               => 'Address',
                'phone'                 => 'Phone',
                'datetime'              => 'Datetime',
                'date'                  => 'Date',
                'image'                 => 'Image',
                'file'                  => 'File',
                'checkbox'              => 'Checkbox',
                'is_required'           => 'Is Required',
                'is_unique'             => 'Is Unique',
                'yes'                   => 'Yes',
                'no'                    => 'No',
                'input_validation'      => 'Input Validation',
                'number'                => 'Number',
                'decimal'               => 'Decimal',
                'email'                 => 'Email',
                'url'                   => 'Url',
                'options'               => 'Options',
                'sort-order'            => 'Sort Order',
                'add-option-btn-title'  => 'Add Option',
                'create-success'        => 'Attribute created successfully.',
                'update-success'        => 'Attribute updated successfully.',
                'update-error'          => 'Unable to update attribute.',
                'delete-success'        => 'Attribute deleted successfully.',
                'delete-failed'         => 'Attribute can not be deleted.',
                'user-define-error'     => 'Can not delete system attribute.'
            ],
        ],

        'datagrid' => [
            'id'                => 'Id',
            'name'              => 'Name',
            'code'              => 'Code',
            'sku'               => 'SKU',
            'type'              => 'Type',
            'price'             => 'Price',
            'email'             => 'Email',
            'status'            => 'Status',
            'active'            => 'Active',
            'inactive'          => 'Inactive',
            'quantity'          => 'Quantity',
            'created_at'        => 'Created at',
            'description'       => 'Description',
            'permission_type'   => 'Permission type',
            'update-success'    => ':resource updated successfully.',
            'destroy-success'   => ':resource deleted successfully.',
        ],

        'response' => [
            'create-success' => 'Success: :name created successfully.',
        ],

        'acl' => [
            'settings'  => 'Settings',
            'users'     => 'Users',
            'roles'     => 'Roles',
            'create'    => 'Create',
            'edit'      => 'Edit',
            'delete'    => 'Delete',
        ],

        'common' => [
            'address'            => 'Address',
            'country'            => 'Country',
            'select-country'     => 'Please select country',
            'state'              => 'State',
            'select-state'       => 'Please select state',
            'city'               => 'City',
            'postcode'           => 'Postcode',
            'address-validation' => 'The "Address" field is required',
            'work'               => 'Work',
            'home'               => 'Home',
            'no-result-found'    => 'Records not found with same name.',
            'add-as'             => 'Add as new'
        ]
    ];
?>