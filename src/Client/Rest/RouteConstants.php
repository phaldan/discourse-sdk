<?php

namespace PhALDan\Discourse\Client\Rest;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
abstract class RouteConstants
{
    const BACKUPS_CREATE = '/admin/backups.json';
    const BACKUPS_LIST = '/admin/backups.json';

    const BADGES_CREATE = '/admin/badges.json';
    const BADGES_DELETE = '/user_badges/%d';
    const BADGES_LIST = '/admin/badges.json';

    const CATEGORIES_CREATE = '/categories.json';
    const CATEGORIES_LIST = '/categories.json';
    const CATEGORIES_SINGLE = '/c/%s.json';
    const CATEGORIES_UPDATE = '/categories/%s';

    const EMAILS_LIST = '/admin/email/%s.json';

    const FLAGS_LIST = '/admin/flags/%s.json';

    const GROUPS_ADD_MEMBER = '/groups/%d/members.json';
    const GROUPS_CREATE = '/admin/groups';
    const GROUPS_DELETE = '/admin/groups/%d.json';
    const GROUPS_DELETE_MEMBER = '/groups/%d/members.json';
    const GROUPS_LIST = '/admin/groups.json';
    const GROUPS_SINGLE = '/groups/%s/members.json';

    const TAGS_LIST = '/tags';
    const TAGS_SINGLE = '/tags/%s';
}
