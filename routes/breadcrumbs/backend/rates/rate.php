<?php

Breadcrumbs::for('admin.rates.index', function ($trail) {
    $trail->push(__('labels.backend.access.rates.management'), route('admin.rates.index'));
});

Breadcrumbs::for('admin.rates.create', function ($trail) {
    $trail->parent('admin.rates.index');
    $trail->push(__('labels.backend.access.rates.management'), route('admin.rates.create'));
});

Breadcrumbs::for('admin.rates.edit', function ($trail, $id) {
    $trail->parent('admin.rates.index');
    $trail->push(__('labels.backend.access.rates.management'), route('admin.rates.edit', $id));
});
