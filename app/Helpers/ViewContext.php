<?php

namespace App\Helpers;


class ViewContext
{
    protected $active;
    protected $pageTitle;

    /**
     * ViewContext constructor.
     * @param string $active
     * @param string|null $pageTitle
     */
    public function __construct(string $active, string $pageTitle = null)
    {
        $this->active    = $active;
        $this->pageTitle = $pageTitle;
    }

    /**
     * @return string
     */
    public function getPageTitle(): ?string
    {
        return $this->pageTitle;
    }

    public function hasTitle(): bool
    {
        return $this->pageTitle != null;
    }

    /**
     * @param string $pageTitle
     */
    public function setPageTitle(string $pageTitle): void
    {
        $this->pageTitle = $pageTitle;
    }

    /**
     * @return string
     */
    public function getActive(): ?string
    {
        return $this->active;
    }

    /**
     * @param string $active
     */
    public function setActive(string $active): void
    {
        $this->active = $active;
    }

    public function isActive(string $linkId)
    {
        return $linkId === $this->active;
    }
}
