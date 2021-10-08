<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\Length(
     *      min = 6,
     *      max = 15,
     *      minMessage = "Номер телефона должен иметь как минимум {{ limit }} символов",
     *      maxMessage = "Номер телефона не должен быть длиннее {{ limit }} символов"
     * )
     */
    private $phone;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type = "string", length = 255)
     * @Assert\Regex(
     *  pattern="[ -\/:-@\[-\`{-~^\s]",
     *  message="Ваша фамилия не должна содержать пробелы и спецсимволы")
     * )
     */
    private $name;

    /**
     * @ORM\Column(type = "string", length = 255)
     * @Assert\Regex(
     *  pattern="[ -\/:-@\[-\`{-~^\s]",
     *  message="Ваше име не должно содержать пробелы и спецсимволы")
     */
    private $family;

    /**
     * @ORM\Column(type = "string", length = 255)

     */
    private $invited;

    /**
     * @ORM\Column(type = "string", length = 255)
     */
    private $company;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->phone;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->phone;
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
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
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

    public function getName(): ?string
    {
        return $this -> name;
    }

    public function setName(string $name): self
    {
        $this -> name = $name;
        return $this;
    }

    public function getFamily(): ?string
    {
        return $this -> family;
    }

    public function setFamily(string $family): self
    {
        $this -> family = $family;
        return $this;
    }

    public function getInvited(): ?string
    {
        return $this -> invited;
    }

    public function setInvited(string $invited): self
    {
        $this -> invited = $invited;
        return $this;
    }

    public function getCompany(): ?string
    {
        return $this -> company;
    }

    public function setCompany(string $company): self
    {
        $this -> company = $company;
        return $this;
    }
}
