<?php namespace App\Presenters;

use Illuminate\Pagination\BootstrapThreePresenter;

class BootstrapTwoPresenter extends BootstrapThreePresenter
{
    public function render()
    {
        if( ! $this->hasPages())
            return '';

        return sprintf(
            '<div class="text-center"><ul class="pagination pagination-centered">%s %s %s %s %s</ul></div>',

            $this->getFirstPage(),
            $this->getPreviousButton('<'),
            $this->getLinks(),
            $this->getNextButton('>'),
            $this->getLastPage()
        );
    }
    protected function getFirstPage($text = '<<')
    {
        if ($this->paginator->currentPage() <= 1) {
            return $this->getDisabledTextWrapper($text);
        }
        $url = $this->paginator->url(1);
        return $this->getPageLinkWrapper($url, $text, 'first');
    }
    protected function getLastPage($text = '>>')
    {
        if (!$this->paginator->hasMorePages()) {
            return $this->getDisabledTextWrapper($text);
        }
        $url = $this->paginator->url($this->paginator->lastPage());
        return $this->getPageLinkWrapper($url, $text, 'last');
    }
}