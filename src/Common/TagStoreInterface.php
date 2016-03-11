<?php

namespace PhpTagStore\Common;

interface TagStoreInterface
{
    public function tagObject($objectId, array $tags);

    public function untagObject($objectId, array $tags);

    public function getTagsForObjects(array $objectIds);

    public function getObjectsWithTags(array $tags);

    public function removeTags(array $tags);

    public function removeObjects(array $objectId);
}
