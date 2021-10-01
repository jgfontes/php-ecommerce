<?php


namespace Jfontes\EdirectoryExercise\Controler;


use Jfontes\EdirectoryExercise\Infrastructure\Helper\flashMessage;
use Jfontes\EdirectoryExercise\Infrastructure\Repository\ListingRepository;

class deleteListingController
{
    use flashMessage;

    private ListingRepository $ListingRepository;

    public function __construct()
    {
        $this->ListingRepository = new ListingRepository();
    }

    public function ProcessRequisite()
    {
        $listingId = filter_input(
            INPUT_GET,
            'id',
            FILTER_SANITIZE_STRING
        );

        $results = $this->ListingRepository->removeListing($listingId);

        if($results) {
            $this->writeFlashMessage("Listing successfully deleted", "success");
            header("Location: /search");
        } else {
            $this->writeFlashMessage("Listing deletion failed", "danger");
            header("Location: /search");
        }
    }
}