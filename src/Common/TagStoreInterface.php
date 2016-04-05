<?php

namespace PhpTagStore\Common;

interface TagStoreInterface
{
    /**
     * Associate the given tags to cache item identified by $itemId.
     *
     * Example: associate a HTTP cache identifier (e.g. a content-digest in the
     *          case of the Symfony HTTP cache) with a set of tags.
     *
     * @param integer $itemId
     * @param string[] $tags
     */
    public function tagItemId($itemId, array $tags);

    /**
     * Unassociate the given tags from the cache item identified by $itemId.
     *
     * NOTE: This is difficult for an so-called "cache based" implementation, is it necessary?
     *
     * @param integer $itemId
     * @param string[] $tags
     */
    public function untagItemId($itemId, array $tags);

    /**
     * Retrieve all tags which are associated with the given $itemIds.
     *
     * NOTE: This is not-performant for an so-called "cache based"
     *       implementation, is it necessary? In what situations would this be
     *       useful
     *
     * @param string[] $itemIds
     * @return string[]
     */
    public function getTagsForItemIds(array $itemIds);

    /**
     * Retrieve all cache identifiers associated with the given $tags.
     *
     * Example: Return a list of HTTP cache entries that are associated with
     *          the given tags in order that they should be invalidated.
     *
     * @param string[] $tags
     */
    public function getItemIdsWithTags(array $tags);

    /**
     * Remove the given tags (and they're cache identifier associations) from
     * the store.
     *
     * Any given tags which do not exist in the short MUST be ignored.
     *
     * Example: Should be called after invalidating a set of tags with a HTTP
     *          cache.
     *
     * @param string[]
     */
    public function removeTags(array $tags);

    /**
     * Remove all given cache IDs.
     *
     * Example?
     */
    public function removeItemIds(array $itemId);
}
