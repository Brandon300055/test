<?php


namespace App\Library\Data;


use App\Models\Models\Data;

class GetData extends Request
{

    /**
     * GetData Constructor.
     */
    function __construct()
    {

    }

    protected function getData()
    {
        return $this->setURL("https://cspf-dev-challenge.herokuapp.com/")->setType("GET")->request();

    }

    /**
     * Stores data in api
     */
    public function storeData()
    {
        $data = $this->getData();
        if (isset( $data['data']['rows']) )
        {
            foreach ( $data['data']['rows'] as $row)
            {
                // create or update
                $Data = Data::where('id', $row['id'])->first();
                $Data = ($Data) ? $Data : new Data();
                $Data->id = $row['id'];
                $Data->fname = $row['fname'];
                $Data->lname = $row['fname'];
                $Data->email = $row['email'];
                $Data->date = $row['date'];
                $Data->save();
            }

            return response("Data Refreshed From Live and stored/updated in DB.", 200);

        }

        // no data at route
        return response("No Data", 410);


//        echo "test";
    }


    public static function refresh()
    {
        $GetData = new GetData();
        return $GetData->storeData();
    }


}
