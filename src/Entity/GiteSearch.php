<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class GiteSearch 
{
    /**
     * @var int|null
     * @Assert\Range(
     *  min=30,
     *  max=500,
     *  minMessage="La valeur minimum est de {{min}} m²",
     *  minMessage="La valeur maxiimum est de {{max}} m²"
     * )
     */
    private $minSurface;
    /**
     * @var int|null
     */
    private $minChambre;
    /**
     * @var int|null
     */
    private $minCouchage;

    /**
     * @var string|null
     */
    private $equipement;

    /**
     * @return int|null
     */ 
    public function getMinSurface(): ?int
    {
        return $this->minSurface;
    }

    

    /**
     * Set the value of minSurface
     *
     * @return  self
     */ 
    public function setMinSurface($minSurface)
    {
        $this->minSurface = $minSurface;

        return $this;
    }

    /**
     * @return int|null
     */ 
    public function getMinChambre(): ?int
    {
        return $this->minChambre;
    }

    /**
     * Set the value of minChambre
     *
     * @return  self
     */ 
    public function setMinChambre($minChambre)
    {
        $this->minChambre = $minChambre;

        return $this;
    }

    /**
     * @return int|null
     */ 
    public function getMinCouchage(): ?int
    {
        return $this->minCouchage;
    }

    /**
     * Set the value of minCouchage
     *
     * @return  self
     */ 
    public function setMinCouchage($minCouchage)
    {
        $this->minCouchage = $minCouchage;

        return $this;
    }

    /**
     * Get the value of equipement
     * 
     */
    public function getEquipement()
    {
        return $this->equipement;
    }

    /**
     * Set the value of equipement
     */
    public function setEquipement($equipement): self
    {
        $this->equipement = $equipement;

        return $this;
    }
}

?>