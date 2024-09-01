<?php

use App\Models\Article;
use App\Models\District;
use App\Models\Neighborhood;
use App\Models\Organization;
use App\Models\Victim;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('victim.create', function (BreadcrumbTrail $trail) {
    $trail->push('Registo', route('victim.create'));
});

Breadcrumbs::for('profile.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('victim.create');
    $trail->push('Perfil', route('profile.edit'));
});

Breadcrumbs::for('profile.update', function (BreadcrumbTrail $trail) {
    $trail->parent('profile.edit');
    $trail->push('Actualizar', route('profile.update'));
});

Breadcrumbs::for('profile.destroy', function (BreadcrumbTrail $trail) {
    $trail->parent('prFofile.edit');
    $trail->push('Eliminar', route('profile.destroy'));
});

Breadcrumbs::for('organization.list', function (BreadcrumbTrail $trail) {
    $trail->parent('victim.create');
    $trail->push('Organizações', route('organization.list'));
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
    $trail->parent('victim.create');
    $trail->push('Províncias', route('province.list'));
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
    $trail->parent('victim.create');
    $trail->push('Distritos', route('district.list'));
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
    $trail->parent('victim.create');
    $trail->push('Bairros', route('neighborhood.list'));
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
    $trail->parent('victim.create');
    $trail->push('Utilizadores', route('user.all'));
});

Breadcrumbs::for('violenceType.list', function (BreadcrumbTrail $trail) {
    $trail->parent('victim.create');
    $trail->push('Tipos de violência', route('violenceType.list'));
});

Breadcrumbs::for('perpetrator.list', function (BreadcrumbTrail $trail) {
    $trail->parent('victim.create');
    $trail->push('Perpetradores', route('perpetrator.list'));
});

Breadcrumbs::for('supposedReasonOfViolence.list', function (BreadcrumbTrail $trail) {
    $trail->parent('victim.create');
    $trail->push('Motivos que causam violência', route('supposedReasonOfViolence.list'));
});

Breadcrumbs::for('violenceIncidentLocation.list', function (BreadcrumbTrail $trail) {
    $trail->parent('victim.create');
    $trail->push('Locais de violência', route('violenceIncidentLocation.list'));
});

Breadcrumbs::for('victim.cases.list', function (BreadcrumbTrail $trail) {
    $trail->parent('victim.create');
    $trail->push('Casos', route('victim.cases.list'));
});


Breadcrumbs::for('victim.edit', static function (BreadcrumbTrail $trail, Victim $victim) {
    $trail->parent('victim.cases.list');
    $trail->push('Editar dados da vítima ' , route('victim.edit',[
        'victim' => $victim
    ]));
});
#

Breadcrumbs::for('victim.case.info', static function (BreadcrumbTrail $trail, Victim $victim) {
    $trail->parent('victim.cases.list');
    $trail->push('Informação da vítima ' , route('victim.case.info',[
        'victim' => $victim
    ]));
});


Breadcrumbs::for('victim.case.edit', static function (BreadcrumbTrail $trail, \App\Models\VictimCase $case) {
    $trail->parent('victim.edit', $case->victim);
    $trail->push('Editar caso ' , route('victim.case.edit',[
        'case' => $case
    ]));
});


Breadcrumbs::for('dashboard.reports', static function (BreadcrumbTrail $trail) {
    $trail->push('Relatórios', route('dashboard.reports'));
});


Breadcrumbs::for('article.create',static function (BreadcrumbTrail $trail) {
    $trail->push('Criar post', route('article.create'));
});

Breadcrumbs::for('article.list',static function (BreadcrumbTrail $trail) {
    $trail->parent('article.create');
    $trail->push('Postagens', route('article.list'));
});

Breadcrumbs::for('article.edit',static function (BreadcrumbTrail $trail, Article $article) {
    $trail->parent('article.list');
    $trail->push('Editar post', route('article.edit',[
        'article' => $article->slug
    ]));
});
