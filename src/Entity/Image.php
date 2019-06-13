<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable
 */
class Image
{
    const SERVER_PATH_TO_IMAGE_FOLDER = '%kernel.project_dir%/public/uploads/images';
   
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $filename;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated;

   

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="filename")
     * 
     * @var File
     */
    private $file;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Magazine", mappedBy="image", cascade={"persist", "remove"})
     */
    private $magazine;



    /**
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

       // we use the original file name here but you should
       // sanitize it at least to avoid any security issues

       // move takes the target directory and target filename as params
       $this->getFile()->move(
           self::SERVER_PATH_TO_IMAGE_FOLDER,
           $this->getFile()->getClientOriginalName()
       );

       // set the path property to the filename where you've saved the file
       $this->filename = $this->getFile()->getClientOriginalName();

       // clean up the file property as you won't need it anymore
       $this->setFile(null);
   }

   /**
    * Lifecycle callback to upload the file to the server.
    */
   public function lifecycleFileUpload()
   {
       $this->upload();
   }

   /**
    * Updates the hash value to force the preUpdate and postUpdate events to fire.
    */
   public function refreshUpdated()
   {
      $this->setUpdated(new \DateTime());
   }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(?\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }
 /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $file
     */
    public function setImageFile(?File $file = null): void
    {
        $this->file = $file;

        if (null !== $file) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->file;
    }

    public function getMagazine(): ?Magazine
    {
        return $this->magazine;
    }

    public function setMagazine(Magazine $magazine): self
    {
        $this->magazine = $magazine;

        // set the owning side of the relation if necessary
        if ($this !== $magazine->getImage()) {
            $magazine->setImage($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getFilename() ?: '';
    }


}
