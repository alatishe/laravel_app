<?php

Breadcrumbs::for('admin.carriers.index', function ($trail) {
    $trail->push(__('labels.backend.access.carriers.management'), route('admin.carriers.index'));
});

Breadcrumbs::for('admin.carriers.create', function ($trail) {
    $trail->parent('admin.carriers.index');
    $trail->push(__('labels.backend.access.carriers.management'), route('admin.carriers.create'));
});

Breadcrumbs::for('admin.carriers.edit', function ($trail, $id) {
    $trail->parent('admin.carriers.index');
    $trail->push(__('labels.backend.access.carriers.management'), route('admin.carriers.edit', $id));
});
