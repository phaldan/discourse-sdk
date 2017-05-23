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

    const INVITES_EMAIL = '/invites';
    const INVITES_CREATE_LINK = '/invites/link';
    const INVITES_CREATE_TOKEN = '/invites/disposable';

    const NOTIFICATIONS_LIST = '/notifications.json';

    const PLUGINS_LIST = '/admin/plugins';

    const POSTS_CREATE = '/posts';
    const POSTS_LIKE = '/post_actions';
    const POSTS_SINGLE = '/posts/%d';
    const POSTS_UNLIKE = '/post_actions/%d';
    const POSTS_UPDATE = '/posts/%d';

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

    const TOPICS_CREATE_SCHEDULED = '/t/%d/status_update';
    const TOPICS_DELETE = '/t/%d.json';
    const TOPICS_INVITE = '/t/%d/invite';
    const TOPICS_LATEST = '/latest.json';
    const TOPICS_NOTIFICATIONS = '/t/%d/notifications';
    const TOPICS_SINGLE = '/t/%d.json';
    const TOPICS_TOP = '/top.json';
    const TOPICS_TOP_FILTERED = '/top/%s.json';
    const TOPICS_UPDATE = '/t/%s/%d.json';
    const TOPICS_UPDATE_SCHEDULED = '/t/%d/change-timestamp';
    const TOPICS_UPDATE_STATUS = '/t/%d/status';

    const USERS_CREATE = '/users';
    const USERS_DIRECTORY_ITEMS = '/directory_items.json';
    const USERS_LIST = '/admin/users/list/%s.json';
    const USERS_SINGLE = '/users/%s.json';
    const USERS_UPDATE_AVATAR = '/users/%s/preferences/avatar/pick';
    const USERS_UPDATE_EMAIL = '/users/%s/preferences/email';
}
