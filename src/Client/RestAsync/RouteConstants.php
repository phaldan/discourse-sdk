<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
abstract class RouteConstants
{
    const BACKUP_CREATE = '/admin/backups.json';
    const BACKUP_LIST = '/admin/backups.json';

    const BADGE_CREATE = '/admin/badges.json';
    const BADGE_DELETE = '/user_badges/%d';
    const BADGE_LIST = '/admin/badges.json';

    const CATEGORY_CREATE = '/categories.json';
    const CATEGORY_LIST = '/categories.json';
    const CATEGORY_SINGLE = '/c/%s.json';
    const CATEGORY_UPDATE = '/categories/%s';

    const EMAIL_LIST = '/admin/email/%s.json';

    const FLAG_LIST = '/admin/flags/%s.json';

    const GROUP_ADD_MEMBER = '/groups/%d/members.json';
    const GROUP_CREATE = '/admin/groups';
    const GROUP_DELETE = '/admin/groups/%d.json';
    const GROUP_DELETE_MEMBER = '/groups/%d/members.json';
    const GROUP_LIST = '/admin/groups.json';
    const GROUP_SINGLE = '/groups/%s/members.json';

    const INVITE_EMAIL = '/invites';
    const INVITE_CREATE_LINK = '/invites/link';
    const INVITE_CREATE_TOKEN = '/invites/disposable';

    const NOTIFICATION_LIST = '/notifications.json';

    const PLUGIN_LIST = '/admin/plugins';

    const POST_CREATE = '/posts';
    const POST_LIKE = '/post_actions';
    const POST_SINGLE = '/posts/%d';
    const POST_UNLIKE = '/post_actions/%d';
    const POST_UPDATE = '/posts/%d';

    const PRIVATE_MESSAGE_INBOX = '/topics/private-messages/%s.json';
    const PRIVATE_MESSAGE_SENT = '/topics/private-messages-sent/%s.json';
    const PRIVATE_MESSAGE_ARCHIVE = '/topics/private-messages-archive/%s.json';
    const PRIVATE_MESSAGE_GROUP = '/topics/private-messages-group/%s/%s.json';
    const PRIVATE_MESSAGE_GROUP_ARCHIVE = '/topics/private-messages-group/%s/%s/archive.json';

    const SITE_SETTING_SET = '/admin/site_settings/%s';

    const TAG_GROUP_CREATE = '/tag_groups.json';
    const TAG_GROUP_LIST = '/tag_groups.json';
    const TAG_GROUP_SINGLE = '/tag_groups/%d.json';
    const TAG_GROUP_UPDATE = '/tag_groups/%d.json';

    const TAG_LIST = '/tags';
    const TAG_SINGLE = '/tags/%s';

    const TOPIC_CREATE_SCHEDULED = '/t/%d/status_update';
    const TOPIC_DELETE = '/t/%d.json';
    const TOPIC_INVITE = '/t/%d/invite';
    const TOPIC_LATEST = '/latest.json';
    const TOPIC_NOTIFICATIONS = '/t/%d/notifications';
    const TOPIC_SINGLE = '/t/%d.json';
    const TOPIC_TOP = '/top.json';
    const TOPIC_TOP_FILTERED = '/top/%s.json';
    const TOPIC_UPDATE = '/t/%s/%d.json';
    const TOPIC_UPDATE_SCHEDULED = '/t/%d/change-timestamp';
    const TOPIC_UPDATE_STATUS = '/t/%d/status';

    const USER_CREATE = '/users';
    const USER_DIRECTORY_ITEMS = '/directory_items.json';
    const USER_LIST = '/admin/users/list/%s.json';
    const USER_SINGLE = '/users/%s.json';
    const USER_UPDATE_AVATAR = '/users/%s/preferences/avatar/pick';
    const USER_UPDATE_EMAIL = '/users/%s/preferences/email';
}
