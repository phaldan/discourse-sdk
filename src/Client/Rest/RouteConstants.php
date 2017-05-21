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

    const NOTIFICATIONS_LIST = '/notifications.json';

    const PRIVATE_MESSAGES_INBOX = '/topics/private-messages/%s.json';
    const PRIVATE_MESSAGES_SENT = '/topics/private-messages-sent/%s.json';
    const PRIVATE_MESSAGES_ARCHIVE = '/topics/private-messages-archive/%s.json';
    const PRIVATE_MESSAGES_GROUP = '/topics/private-messages-group/%s/%s.json';
    const PRIVATE_MESSAGES_GROUP_ARCHIVE = '/topics/private-messages-group/%s/%s/archive.json';

    const SITE_SETTINGS_SET = '/admin/site_settings/%s';

    const TAG_GROUP_CREATE = '/tag_groups.json';
    const TAG_GROUPS_LIST = '/tag_groups.json';
    const TAG_GROUPS_SINGLE = '/tag_groups/%d.json';
    const TAG_GROUPS_UPDATE = '/tag_groups/%d.json';

    const TAGS_LIST = '/tags';
    const TAGS_SINGLE = '/tags/%s';

    const USERS_CREATE = '/users';
    const USERS_DIRECTORY_ITEMS = '/directory_items.json';
    const USERS_LIST = '/admin/users/list/%s.json';
    const USERS_SINGLE = '/users/%s.json';
    const USERS_UPDATE_AVATAR = '/users/%s/preferences/avatar/pick';
    const USERS_UPDATE_EMAIL = '/users/%s/preferences/email';
}
