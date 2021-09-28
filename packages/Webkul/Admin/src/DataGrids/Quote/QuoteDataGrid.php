<?php

namespace Webkul\Admin\DataGrids\Quote;

use Illuminate\Support\Facades\DB;
use Webkul\UI\DataGrid\DataGrid;

class QuoteDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     *
     * @return void
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('quotes')
            ->addSelect(
                'quotes.id',
                'quotes.subject',
                'quotes.expired_at',
                'quotes.sub_total',
                'quotes.discount_amount',
                'quotes.tax_amount',
                'quotes.adjustment_amount',
                'quotes.grand_total',
                'users.id as user_id',
                'users.name as user_name',
                'persons.id as person_id',
                'persons.name as person_name'
            )
            ->leftJoin('users', 'quotes.user_id', '=', 'users.id')
            ->leftJoin('persons', 'quotes.person_id', '=', 'persons.id');

        $currentUser = auth()->guard('user')->user();

        if ($currentUser->view_permission != 'global') {
            if ($currentUser->view_permission == 'group') {
                $queryBuilder->whereIn('quotes.user_id', app('\Webkul\User\Repositories\UserRepository')->getCurrentUserGroupsUserIds());
            } else {
                $queryBuilder->where('quotes.user_id', $currentUser->id);
            }
        }

        $this->addFilter('id', 'quotes.id');
        $this->addFilter('user', 'quotes.user_id');
        $this->addFilter('user_name', 'quotes.user_id');
        $this->addFilter('person_name', 'persons.name');

        $this->setQueryBuilder($queryBuilder);
    }

    /**
     * Add columns.
     *
     * @return void
     */
    public function addColumns()
    {
        $this->addColumn([
            'index'             => 'subject',
            'label'             => trans('admin::app.datagrid.subject'),
            'type'              => 'string',
            'searchable'        => true,
            'sortable'          => true,
        ]);

        $this->addColumn([
            'index'              => 'user_name',
            'label'              => trans('admin::app.datagrid.sales-person'),
            'type'               => 'dropdown',
            'dropdown_options'   => app('\Webkul\User\Repositories\UserRepository')->get(['id as value', 'name as label'])->toArray(),
            'searchable'         => true,
            'sortable'           => true,
            'closure'            => function ($row) {
                $route = urldecode(route('admin.settings.users.index', ['id[eq]' => $row->user_id]));

                return "<a href='" . $route . "'>" . $row->user_name . "</a>";
            },
        ]);

        $this->addColumn([
            'index'           => 'person_name',
            'label'           => trans('admin::app.datagrid.person'),
            'type'            => 'string',
            'searchable'      => true,
            'sortable'        => true,
            'closure'         => function ($row) {
                $route = urldecode(route('admin.contacts.persons.index', ['id[eq]' => $row->person_id]));

                return "<a href='" . $route . "'>" . $row->person_name . "</a>";
            },
        ]);

        $this->addColumn([
            'index'         => 'sub_total',
            'label'         => trans('admin::app.datagrid.sub-total'),
            'type'          => 'string',
            'searchable'    => true,
            'sortable'      => true,
            'closure'       => function ($row) {
                return core()->formatBasePrice($row->sub_total, 2);
            },
        ]);

        $this->addColumn([
            'index'         => 'discount_amount',
            'label'         => trans('admin::app.datagrid.discount'),
            'type'          => 'string',
            'searchable'    => true,
            'sortable'      => true,
            'closure'       => function ($row) {
                return core()->formatBasePrice($row->discount_amount, 2);
            },
        ]);

        $this->addColumn([
            'index'         => 'tax_amount',
            'label'         => trans('admin::app.datagrid.tax'),
            'type'          => 'string',
            'searchable'    => true,
            'sortable'      => true,
            'closure'       => function ($row) {
                return core()->formatBasePrice($row->tax_amount, 2);
            },
        ]);

        $this->addColumn([
            'index'         => 'adjustment_amount',
            'label'         => trans('admin::app.datagrid.adjustment'),
            'type'          => 'string',
            'searchable'    => true,
            'sortable'      => true,
            'closure'       => function ($row) {
                return core()->formatBasePrice($row->adjustment_amount, 2);
            },
        ]);

        $this->addColumn([
            'index'         => 'grand_total',
            'label'         => trans('admin::app.datagrid.grand-total'),
            'type'          => 'string',
            'searchable'    => true,
            'sortable'      => true,
            'closure'       => function ($row) {
                return core()->formatBasePrice($row->grand_total, 2);
            },
        ]);
    }

    /**
     * Prepare actions.
     *
     * @return void
     */
    public function prepareActions()
    {
        $this->addAction([
            'title'  => trans('ui::app.datagrid.edit'),
            'method' => 'GET',
            'route'  => 'admin.quotes.edit',
            'icon'   => 'pencil-icon',
        ]);

        $this->addAction([
            'title'        => trans('ui::app.datagrid.delete'),
            'method'       => 'DELETE',
            'route'        => 'admin.quotes.delete',
            'confirm_text' => trans('ui::app.datagrid.massaction.delete', ['resource' => 'user']),
            'icon'         => 'trash-icon',
        ]);
    }

    /**
     * Prepare mass actions.
     *
     * @return void
     */
    public function prepareMassActions()
    {
        $this->addMassAction([
            'type'   => 'delete',
            'label'  => trans('ui::app.datagrid.delete'),
            'action' => route('admin.quotes.mass_delete'),
            'method' => 'PUT',
        ]);
    }
}
