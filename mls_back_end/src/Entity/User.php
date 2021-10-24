<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("allUser")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups("allUser")
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     * @Groups("allUser")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("allUser")
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("allUser")
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("allUser")
     */
    private $lastName;

    /**
     * @ORM\Column(type="text")
     * @Groups("allUser")
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("allUser")
     */
    private $training;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups("allUser")
     */
    private $birthDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("allUser")
     */
    private $phone;

    /**
     * @ORM\Column(type="text")
     * @Groups("allUser")
     */
    private $actualJob;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups("allUser")
     */
    private $links;

    /**
     * @ORM\Column(type="date")
     * @Groups("allUser")
     */
    private $lastConnection;

    /**
     * @ORM\Column(type="date")
     * @Groups("allUser")
     */
    private $registrationDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups("allUser")
     */
    private $archivingDate;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("allUser")
     */
    private $desactivation;

    /**
     * @ORM\Column(type="integer")
     */
    private $notificationCount;

    /**
     * @ORM\OneToMany(targetEntity=Question::class, mappedBy="identityUser")
     */
    private $questions;

    /**
     * @ORM\OneToMany(targetEntity=Reply::class, mappedBy="identityUser")
     */
    private $replies;

    

    public function __construct()
    {
        $this->questions = new ArrayCollection();
        $this->replies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getTraining(): ?string
    {
        return $this->training;
    }

    public function setTraining(string $training): self
    {
        $this->training = $training;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(?\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getActualJob(): ?string
    {
        return $this->actualJob;
    }

    public function setActualJob(string $actualJob): self
    {
        $this->actualJob = $actualJob;

        return $this;
    }

    public function getLinks(): ?string
    {
        return $this->links;
    }

    public function setLinks(?string $links): self
    {
        $this->links = $links;

        return $this;
    }

    public function getLastConnection(): ?\DateTimeInterface
    {
        return $this->lastConnection;
    }

    public function setLastConnection(\DateTimeInterface $lastConnection): self
    {
        $this->lastConnection = $lastConnection;

        return $this;
    }

    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registrationDate;
    }

    public function setRegistrationDate(\DateTimeInterface $registrationDate): self
    {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    public function getArchivingDate(): ?\DateTimeInterface
    {
        return $this->archivingDate;
    }

    public function setArchivingDate(?\DateTimeInterface $archivingDate): self
    {
        $this->archivingDate = $archivingDate;

        return $this;
    }

    public function getDesactivation(): ?bool
    {
        return $this->desactivation;
    }

    public function setDesactivation(bool $desactivation): self
    {
        $this->desactivation = $desactivation;

        return $this;
    }

    public function getNotificationCount(): ?int
    {
        return $this->notificationCount;
    }

    public function setNotificationCount(int $notificationCount): self
    {
        $this->notificationCount = $notificationCount;

        return $this;
    }

    /**
     * @return Collection|Question[]
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions[] = $question;
            $question->setIdentityUser($this);
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        if ($this->questions->removeElement($question)) {
            // set the owning side to null (unless already changed)
            if ($question->getIdentityUser() === $this) {
                $question->setIdentityUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reply[]
     */
    public function getReplies(): Collection
    {
        return $this->replies;
    }

    public function addReply(Reply $reply): self
    {
        if (!$this->replies->contains($reply)) {
            $this->replies[] = $reply;
            $reply->setIdentityUser($this);
        }

        return $this;
    }

    public function removeReply(Reply $reply): self
    {
        if ($this->replies->removeElement($reply)) {
            // set the owning side to null (unless already changed)
            if ($reply->getIdentityUser() === $this) {
                $reply->setIdentityUser(null);
            }
        }

        return $this;
    }

}
