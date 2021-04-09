<?php

namespace Webkul\Attribute\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Attribute extends Seeder
{

    public function run()
    {
        DB::table('attributes')->delete();

        DB::table('attribute_translations')->delete();

        $now = Carbon::now();

        DB::table('attributes')->insert([
            [
                'id'                  => '1',
                'code'                => 'title',
                'name'                => 'Title',
                'type'                => 'text',
                'entity_type'         => 'leads',
                'validation'          => NULL,
                'sort_order'          => '1',
                'is_required'         => '1',
                'is_unique'           => '0',
                'quick_add'           => '1',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ], [
                'id'                  => '2',
                'code'                => 'description',
                'name'                => 'Description',
                'type'                => 'text',
                'entity_type'         => 'leads',
                'validation'          => NULL,
                'sort_order'          => '2',
                'is_required'         => '0',
                'is_unique'           => '0',
                'quick_add'           => '1',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ], [
                'id'                  => '3',
                'code'                => 'lead_value',
                'name'                => 'Lead Value',
                'type'                => 'price',
                'entity_type'         => 'leads',
                'validation'          => NULL,
                'sort_order'          => '3',
                'is_required'         => '1',
                'is_unique'           => '0',
                'quick_add'           => '1',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ], [
                'id'                  => '4',
                'code'                => 'source',
                'name'                => 'Source',
                'type'                => 'text',
                'entity_type'         => 'leads',
                'validation'          => NULL,
                'sort_order'          => '4',
                'is_required'         => '1',
                'is_unique'           => '0',
                'quick_add'           => '1',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ], [
                'id'                  => '5',
                'code'                => 'type',
                'name'                => 'Type',
                'type'                => 'text',
                'entity_type'         => 'leads',
                'validation'          => NULL,
                'sort_order'          => '5',
                'is_required'         => '1',
                'is_unique'           => '0',
                'quick_add'           => '1',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ], [
                'id'                  => '6',
                'code'                => 'tags',
                'name'                => 'Tags',
                'type'                => 'lookup',
                'entity_type'         => 'leads',
                'validation'          => NULL,
                'sort_order'          => '6',
                'is_required'         => '0',
                'is_unique'           => '0',
                'quick_add'           => '1',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ], [
                'id'                  => '7',
                'code'                => 'stage',
                'name'                => 'Stage',
                'type'                => 'lookup',
                'entity_type'         => 'leads',
                'validation'          => NULL,
                'sort_order'          => '7',
                'is_required'         => '0',
                'is_unique'           => '0',
                'quick_add'           => '1',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ], [
                'id'                  => '8',
                'code'                => 'first_name',
                'name'                => 'First Name',
                'type'                => 'text',
                'entity_type'         => 'customers',
                'validation'          => NULL,
                'sort_order'          => '1',
                'is_required'         => '1',
                'is_unique'           => '0',
                'quick_add'           => '1',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ], [
                'id'                  => '9',
                'code'                => 'last_name',
                'name'                => 'Last Name',
                'type'                => 'text',
                'entity_type'         => 'customers',
                'validation'          => NULL,
                'sort_order'          => '2',
                'is_required'         => '1',
                'is_unique'           => '0',
                'quick_add'           => '1',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ], [
                'id'                  => '10',
                'code'                => 'email',
                'name'                => 'Email',
                'type'                => 'email',
                'entity_type'         => 'customers',
                'validation'          => NULL,
                'sort_order'          => '3',
                'is_required'         => '1',
                'is_unique'           => '1',
                'quick_add'           => '1',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ], [
                'id'                  => '11',
                'code'                => 'contact_no',
                'name'                => 'Contact No',
                'type'                => 'phone',
                'entity_type'         => 'customers',
                'validation'          => 'numeric',
                'sort_order'          => '4',
                'is_required'         => '1',
                'is_unique'           => '0',
                'quick_add'           => '1',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ], [
                'id'                  => '12',
                'code'                => 'address',
                'name'                => 'Address',
                'type'                => 'address',
                'entity_type'         => 'customers',
                'validation'          => NULL,
                'sort_order'          => '05',
                'is_required'         => '1',
                'is_unique'           => '0',
                'quick_add'           => '1',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ], [
                'id'                  => '13',
                'code'                => 'organization',
                'name'                => 'Organization',
                'type'                => 'lookup',
                'entity_type'         => 'customers',
                'validation'          => NULL,
                'sort_order'          => '6',
                'is_required'         => '1',
                'is_unique'           => '0',
                'quick_add'           => '1',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ], [
                'id'                  => '14',
                'code'                => 'name',
                'name'                => 'Name',
                'type'                => 'text',
                'entity_type'         => 'organizations',
                'validation'          => NULL,
                'sort_order'          => '1',
                'is_required'         => '1',
                'is_unique'           => '0',
                'quick_add'           => '1',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ], [
                'id'                  => '15',
                'code'                => 'address',
                'name'                => 'Address',
                'type'                => 'address',
                'entity_type'         => 'organizations',
                'validation'          => NULL,
                'sort_order'          => '2',
                'is_required'         => '1',
                'is_unique'           => '0',
                'quick_add'           => '1',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ], [
                'id'                  => '16',
                'code'                => 'name',
                'name'                => 'Name',
                'type'                => 'text',
                'entity_type'         => 'products',
                'validation'          => NULL,
                'sort_order'          => '1',
                'is_required'         => '1',
                'is_unique'           => '0',
                'quick_add'           => '1',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ], [
                'id'                  => '17',
                'code'                => 'description',
                'name'                => 'Description',
                'type'                => 'text',
                'entity_type'         => 'products',
                'validation'          => NULL,
                'sort_order'          => '1',
                'is_required'         => '0',
                'is_unique'           => '0',
                'quick_add'           => '0',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ], [
                'id'                  => '18',
                'code'                => 'sku',
                'name'                => 'SKU',
                'type'                => 'text',
                'entity_type'         => 'products',
                'validation'          => NULL,
                'sort_order'          => '2',
                'is_required'         => '1',
                'is_unique'           => '1',
                'quick_add'           => '1',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ], [
                'id'                  => '19',
                'code'                => 'quantity',
                'name'                => 'Quantity',
                'type'                => 'text',
                'entity_type'         => 'products',
                'validation'          => 'numeric',
                'sort_order'          => '2',
                'is_required'         => '1',
                'is_unique'           => '0',
                'quick_add'           => '1',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ], [
                'id'                  => '20',
                'code'                => 'price',
                'name'                => 'Price',
                'type'                => 'text',
                'entity_type'         => 'products',
                'validation'          => 'decimal',
                'sort_order'          => '3',
                'is_required'         => '1',
                'is_unique'           => '0',
                'quick_add'           => '1',
                'is_user_defined'     => '0',
                'created_at'          => $now,
                'updated_at'          => $now,
            ]
        ]);
    }
}