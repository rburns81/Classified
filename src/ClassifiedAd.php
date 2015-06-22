<?php
namespace classified;
class ClassifiedAd
{
    // Contact info was being handled poorly.  Need to figure out better way
    public $id;
    public $type;
    public $teaser;
    public $description;
    public $price;
    public $adOwner;
    public $pics;

    public function __construct($id, $type, $teaser, $description, $price, $adOwner, $contact1, $contact2, $pics = null)
    {
        $this->id = $id;
        $this->type = $type;
        $this->teaser = $teaser;
        $this->description = $description;
        $this->price = '$'.number_format($price,2);
        $this->adOwner = $adOwner;
        $this->contact1 = $contact1;
        $this->contact2 = $contact2;
        $this->pics = $pics;
    }

    public function makeContactInfo()
    {
        $contact = $this->contact2 == null ? $this->contact1 : $this->contact1 . ' or ' . $this->contact2;
        return 'If interested, contact ' . $this->adOwner . ' at ' . $contact;
    }

    public function writeAdHtml($ads)
    {

    }
}