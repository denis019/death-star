<?php

namespace App\Ship\Dto;

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class PaginationDto
 * @package App\Ship\Dto
 */
class PaginationDto extends AbstractDto
{
    public $currentPage;

    public $data;

    public $firstPageUrl;

    public $from;

    public $lastPage;

    public $lastPageUrl;

    public $nextPageUrl;

    public $path;

    public $perPage;

    public $prevPageUrl;

    public $to;

    public $total;

    /**
     * @return LengthAwarePaginator
     */
    public function getLengthAwarePaginator(): LengthAwarePaginator
    {
        return new LengthAwarePaginator(
            $this->data,
            $this->total,
            $this->perPage,
            $this->currentPage,
            $this->getOptions()
        );
    }

    /**
     * @return array
     */
    protected function getOptions(): array
    {
        return [];
    }

    /**
     * @param string $url
     * @return string
     */
    protected function getUrlLastPart(string $url): string
    {
        $linkArray = explode('/', $url);
        return end($linkArray);
    }
}
