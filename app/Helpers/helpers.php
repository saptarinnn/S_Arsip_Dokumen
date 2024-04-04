<?php

use Carbon\Carbon;

/**
 * Create String Random
 *
 * @return response()
 */
function quickRandom($length)
{
    $pool = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
}

/**
 * Create String Random
 *
 * @return response()
 */
function convertYmdToMdy($date)
{
    return Carbon::createFromFormat('Y-m-d', $date)->format('d F Y');
}

/**
 * Set Month Indonesian
 *
 * @return response()
 */
function getMonthIndonesian()
{
    return [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',
    ];
}

/**
 * Set Permission Default
 *
 * @return response()
 */
function setPermission()
{
    return [
        'create',
        'read',
        'update',
        'delete',
    ];
}
