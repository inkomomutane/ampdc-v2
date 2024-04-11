<?php

use App\Models\District;
use App\Models\Neighborhood;
use App\Models\Organization;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('victim.register', function (BreadcrumbTrail $trail) {
    $trail->push('Registo', route('victim.register'));
});

Breadcrumbs::for('profile.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('victim.register');
    $trail->push('Perfil', route('profile.edit'));
});

Breadcrumbs::for('profile.update', function (BreadcrumbTrail $trail) {
    $trail->parent('profile.edit');
    $trail->push('Actualizar', route('profile.update'));
});

Breadcrumbs::for('profile.destroy', function (BreadcrumbTrail $trail) {
    $trail->parent('profile.edit');
    $trail->push('Eliminar', route('profile.destroy'));
});

Breadcrumbs::for('organization.list', function (BreadcrumbTrail $trail) {
    $trail->parent('victim.register');
    $trail->push('Organizações', route('organization.list'));
});

Breadcrumbs::for('organization.store', function (BreadcrumbTrail $trail) {
    $trail->parent('organization.list');
    $trail->push('Registo', route('organization.store'));
});

Breadcrumbs::for('organization.update', function (BreadcrumbTrail $trail, Organization $organization) {
    $trail->parent('organization.list');
    $trail->push('Actualizar', route('organization.update',[
        'organization' => $organization
    ]));
});

Breadcrumbs::for('organization.delete', function (BreadcrumbTrail $trail, Organization $organization) {
    $trail->parent('organization.list');
    $trail->push('Eliminar', route('organization.delete',[
'organization' => $organization
    ]));
});

Breadcrumbs::for('province.list', function (BreadcrumbTrail $trail) {
    $trail->parent('victim.register');
    $trail->push('Províncias', route('province.list'));
});

Breadcrumbs::for('province.store', function (BreadcrumbTrail $trail) {
    $trail->parent('province.list');
    $trail->push('Registo', route('province.store'));
});

Breadcrumbs::for('province.update', function (BreadcrumbTrail $trail,\App\Models\Province $province) {
    $trail->parent('province.list');
    $trail->push('Actualizar', route('province.update',[
        'province' => $province
    ]));
});

Breadcrumbs::for('province.delete', function (BreadcrumbTrail $trail,\App\Models\Province $province) {
    $trail->parent('province.list');
    $trail->push('Eliminar', route('province.delete',[
        'province' => $province
    ]));
});

Breadcrumbs::for('district.list', function (BreadcrumbTrail $trail) {
    $trail->parent('victim.register');
    $trail->push('Distritos', route('district.list'));
});

Breadcrumbs::for('district.store', function (BreadcrumbTrail $trail) {
    $trail->parent('district.list');
    $trail->push('Registo', route('district.store'));
});

Breadcrumbs::for('district.update', function (BreadcrumbTrail $trail, District $district) {
    $trail->parent('district.list');
    $trail->push('Actualizar', route('district.update',[
        'district' => $district
    ]));
});

Breadcrumbs::for('district.delete', function (BreadcrumbTrail $trail) {
    $trail->parent('district.list');
    $trail->push('Eliminar', route('district.delete'));
});

Breadcrumbs::for('neighborhood.list', function (BreadcrumbTrail $trail) {
    $trail->parent('victim.register');
    $trail->push('Bairros', route('neighborhood.list'));
});

Breadcrumbs::for('neighborhood.store', function (BreadcrumbTrail $trail) {
    $trail->parent('neighborhood.list');
    $trail->push('Registo', route('neighborhood.store'));
});

Breadcrumbs::for('neighborhood.update', function (BreadcrumbTrail $trail,Neighborhood $neighborhood) {
    $trail->parent('neighborhood.list');
    $trail->push('Actualizar', route('neighborhood.update',[
        'neighborhood' => $neighborhood
    ]));
});

Breadcrumbs::for('neighborhood.delete', function (BreadcrumbTrail $trail, Neighborhood $neighborhood) {
    $trail->parent('neighborhood.list');
    $trail->push('Eliminar', route('neighborhood.delete',[
        'neighborhood' => $neighborhood
    ]));
});

Breadcrumbs::for('user.all', function (BreadcrumbTrail $trail) {
    $trail->parent('victim.register');
    $trail->push('Utilizadores', route('user.all'));
});

Breadcrumbs::for('user.store', function (BreadcrumbTrail $trail) {
    $trail->parent('user.all');
    $trail->push('Registo', route('user.store'));
});

Breadcrumbs::for('user.update', function (BreadcrumbTrail $trail, \App\Models\User $user) {
    $trail->parent('user.all');
    $trail->push('Actualizar', route('user.update',[
        'user' => $user
    ]));
});

Breadcrumbs::for('user.status', function (BreadcrumbTrail $trail) {
    $trail->parent('user.all');
    $trail->push('Eliminar', route('user.status'));
});

Breadcrumbs::for('violenceType.list', function (BreadcrumbTrail $trail) {
    $trail->parent('victim.register');
    $trail->push('Tipos de Violência', route('violenceType.list'));
});

Breadcrumbs::for('violenceType.store', function (BreadcrumbTrail $trail) {
    $trail->parent('violenceType.list');
    $trail->push('Registo', route('violenceType.store'));
});

Breadcrumbs::for('violenceType.update', function (BreadcrumbTrail $trail, \App\Models\ViolenceType  $violenceType) {
    $trail->parent('violenceType.list');
    $trail->push('Actualizar', route('violenceType.update',[
        'violenceType' => $violenceType
    ]));
});

Breadcrumbs::for('violenceType.delete', function (BreadcrumbTrail $trail,\App\Models\ViolenceType  $violenceType) {
    $trail->parent('violenceType.list');
    $trail->push('Eliminar', route('violenceType.delete',[
        'violenceType' => $violenceType
    ]));
});


