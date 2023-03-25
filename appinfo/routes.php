<?php

function getWildcard($param)
{
    return [
        'requirements' => [$param => '.*'],
        'defaults' => [$param => '']
    ];
}

function w($base, $param)
{
    return array_merge($base, getWildcard($param));
}

return [
    'routes' => [
        // Vue routes for deep links
        ['name' => 'Page#main', 'url' => '/', 'verb' => 'GET'],
        ['name' => 'Page#favorites', 'url' => '/favorites', 'verb' => 'GET'],
        ['name' => 'Page#videos', 'url' => '/videos', 'verb' => 'GET'],
        ['name' => 'Page#archive', 'url' => '/archive', 'verb' => 'GET'],
        ['name' => 'Page#thisday', 'url' => '/thisday', 'verb' => 'GET'],
        ['name' => 'Page#map', 'url' => '/map', 'verb' => 'GET'],

        // Routes with params
        w(['name' => 'Page#folder', 'url' => '/folders/{path}', 'verb' => 'GET'], 'path'),
        w(['name' => 'Page#albums', 'url' => '/albums/{id}', 'verb' => 'GET'], 'id'),
        w(['name' => 'Page#recognize', 'url' => '/recognize/{name}', 'verb' => 'GET'], 'name'),
        w(['name' => 'Page#facerecognition', 'url' => '/facerecognition/{name}', 'verb' => 'GET'], 'name'),
        w(['name' => 'Page#places', 'url' => '/places/{id}', 'verb' => 'GET'], 'id'),
        w(['name' => 'Page#tags', 'url' => '/tags/{name}', 'verb' => 'GET'], 'name'),

        // Public folder share
        ['name' => 'Public#showShare', 'url' => '/s/{token}', 'verb' => 'GET'],
        [
            'name' => 'Public#showAuthenticate',
            'url' => '/s/{token}/authenticate/{redirect}',
            'verb' => 'GET',
        ],
        [
            'name' => 'Public#authenticate',
            'url' => '/s/{token}/authenticate/{redirect}',
            'verb' => 'POST',
        ],

        // Public album share
        ['name' => 'PublicAlbum#showShare', 'url' => '/a/{token}', 'verb' => 'GET'],

        // API Routes
        ['name' => 'Days#days', 'url' => '/api/days', 'verb' => 'GET'],
        ['name' => 'Days#day', 'url' => '/api/days/{id}', 'verb' => 'GET'],
        ['name' => 'Days#dayPost', 'url' => '/api/days', 'verb' => 'POST'],
        ['name' => 'Folders#sub', 'url' => '/api/folders/sub', 'verb' => 'GET'],

        ['name' => 'Clusters#list', 'url' => '/api/clusters/{backend}', 'verb' => 'GET'],
        ['name' => 'Clusters#preview', 'url' => '/api/clusters/{backend}/preview', 'verb' => 'GET'],
        ['name' => 'Clusters#download', 'url' => '/api/clusters/{backend}/download', 'verb' => 'POST'],

        ['name' => 'Tags#set', 'url' => '/api/tags/set/{id}', 'verb' => 'PATCH'],

        ['name' => 'Map#clusters', 'url' => '/api/map/clusters', 'verb' => 'GET'],

        ['name' => 'Archive#archive', 'url' => '/api/archive/{id}', 'verb' => 'PATCH'],

        ['name' => 'Image#preview', 'url' => '/api/image/preview/{id}', 'verb' => 'GET'],
        ['name' => 'Image#multipreview', 'url' => '/api/image/multipreview', 'verb' => 'POST'],
        ['name' => 'Image#info', 'url' => '/api/image/info/{id}', 'verb' => 'GET'],
        ['name' => 'Image#setExif', 'url' => '/api/image/set-exif/{id}', 'verb' => 'PATCH'],
        ['name' => 'Image#decodable', 'url' => '/api/image/decodable/{id}', 'verb' => 'GET'],

        ['name' => 'Video#transcode', 'url' => '/api/video/transcode/{client}/{fileid}/{profile}', 'verb' => 'GET'],
        ['name' => 'Video#livephoto', 'url' => '/api/video/livephoto/{fileid}', 'verb' => 'GET'],

        ['name' => 'Download#request', 'url' => '/api/download', 'verb' => 'POST'],
        ['name' => 'Download#file', 'url' => '/api/download/{handle}', 'verb' => 'GET'],
        ['name' => 'Download#one', 'url' => '/api/stream/{fileid}', 'verb' => 'GET'],

        ['name' => 'Share#links', 'url' => '/api/share/links', 'verb' => 'GET'],
        ['name' => 'Share#createNode', 'url' => '/api/share/node', 'verb' => 'POST'],
        ['name' => 'Share#deleteShare', 'url' => '/api/share/delete', 'verb' => 'POST'],

        // Config API
        ['name' => 'Other#setUserConfig', 'url' => '/api/config/{key}', 'verb' => 'PUT'],

        // Service worker
        ['name' => 'Other#serviceWorker', 'url' => '/service-worker.js', 'verb' => 'GET'],
    ]
];
