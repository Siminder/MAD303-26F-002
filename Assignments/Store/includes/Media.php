<?php
    class Media{
        protected $id;
        protected $title;
        protected $productionCompany;

        public $yearReleased;

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param mixed $title
         */
        public function setTitle($title)
        {
            $this->title = $title;
        }

        /**
         * @return mixed
         */
        public function getProductionCompany()
        {
            return $this->productionCompany;
        }

        /**
         * @param mixed $productionCompany
         */
        public function setProductionCompany($productionCompany)
        {
            $this->productionCompany = $productionCompany;
        }

        /**
         * @return mixed
         */
        public function getYearReleased()
        {
            return $this->yearReleased;
        }

        /**
         * @param mixed $yearReleased
         */
        public function setYearReleased($yearReleased)
        {
            $this->yearReleased = $yearReleased;
        }




    }


?>
