<?php

namespace PhpTagStore\Common;

interface TagStoreInterface
{
    /**
     * Associate the given tags to cache item identified by $cacheId.
     *
     * Example: associate a HTTP cache identifier (e.g. a content-digest in the
     *          case of the Symfony HTTP cache) with a set of tags.
     *
     * @param integer $cacheId
     * @param string[] $tags
     */
    public function tagCacheId($cacheId, array $tags);

    /**
     * Unassociate the given tags from the cache item identified by $cacheId.
     *
     * NOTE: This is difficult for an so-called "cache based" implementation, is it necessary?
     *
     * @param integer $cacheId
     * @param string[] $tags
     */
    public function untagCacheId($cacheId, array $tags);

    /**
     * Retrieve all tags which are associated with the given $cacheIds.
     *
     * NOTE: This is not-performant for an so-called "cache based"
     *       implementation, is it necessary? In what situations would this be
     *       useful
     *
     * @param string[] $cacheIds
     * @return string[]
     */
    public function getTagsForCacheIds(array $cacheIds);

    /**
     * Retrieve all cache identifiers associated with the given $tags.
     *
     * Example: Return a list of HTTP cache entries that are associated with
     *          the given tags in order that they should be invalidated.
     *
     * @param string[] $tags
     */
    public function getCacheIdsWithTags(array $tags);

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
    public function removeCacheIds(array $cacheId);

    /**
     * Remove all tags from the tag store.
     *
     * Example?
     */
    public function purgeTags();
}
