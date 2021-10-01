<?php


namespace Jfontes\EdirectoryExercise\Controler;

use Jfontes\EdirectoryExercise\Entity\Listing;
use Jfontes\EdirectoryExercise\Infrastructure\Helper\HtmlRenderer;
use Jfontes\EdirectoryExercise\Infrastructure\Repository\ListingRepository;

class SearchListingController
{
    use HtmlRenderer;

    private ListingRepository $ListingRepository;

    public function __construct()
    {
        $this->ListingRepository = new ListingRepository();
    }

    public function ProcessRequisite()
    {
        $searchString = filter_input(
            INPUT_POST,
            'search',
            FILTER_SANITIZE_STRING
        );

        $searchResults = ($this->ListingRepository)->searchListing($searchString);

        $html = $this->RenderHtml("searchListing.php", [
            'listings' => $searchResults
            ]
        );

        echo $html;
    }
}