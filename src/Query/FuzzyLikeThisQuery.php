<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\ElasticsearchDSL\Query;

use ONGR\ElasticsearchDSL\BuilderInterface;
use ONGR\ElasticsearchDSL\ParametersTrait;

/**
 * Elasticsearch fuzzy_like_this query class.
 */
class FuzzyLikeThisQuery implements BuilderInterface
{
    use ParametersTrait;

    /**
     * @var string[]
     */
    private $fields;

    /**
     * @var string
     */
    private $likeText;

    /**
     * @param string[] $fields
     * @param string   $likeText
     * @param array    $parameters
     */
    public function __construct(array $fields, $likeText, array $parameters = [])
    {
        $this->fields = $fields;
        $this->likeText = $likeText;
        $this->setParameters($parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'fuzzy_like_this';
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        $output = [
            'fields' => $this->fields,
            'like_text' => $this->likeText,
        ];

        return $this->processArray($output);
    }
}
