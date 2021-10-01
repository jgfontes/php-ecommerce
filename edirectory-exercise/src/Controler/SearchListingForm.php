<?php


namespace Jfontes\EdirectoryExercise\Controler;

use Jfontes\EdirectoryExercise\Entity\Listing;
use Jfontes\EdirectoryExercise\Infrastructure\Helper\HtmlRenderer;
use Jfontes\EdirectoryExercise\Infrastructure\Repository\ListingRepository;

class SearchListingForm
{
    use HtmlRenderer;

    private ListingRepository $ListingRepository;

    public function ProcessRequisite()
    {
        $html = $this->RenderHtml("searchListing.php", []);

        echo $html;
    }
}