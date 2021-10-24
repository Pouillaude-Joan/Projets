<?php

namespace App\Controller;

use App\Entity\Domain;
use App\Entity\Question;
use App\Entity\Reply;
use App\Entity\SubDomain;
use App\Entity\User;
use App\Entity\Tutorial;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DatabaseController extends AbstractController
{
	#[Route('/_database', name: '_fill_database')]
	public function index(UserPasswordEncoderInterface $passwordEncoder): Response
	{
		ini_set('memory_limit', '18538750076');
		$entityManager = $this->getDoctrine()->getManager();
		$entityManager->clear();
		
		$specialUsers = $this->createSpecialUsers($passwordEncoder);
		$genericUsers = $this->createGenericUsers($passwordEncoder);
		$domains = $this->createDomains();
		$subDomains = $this->createSubDomains($domains);
		$tutorials = $this->createTutorials($genericUsers);
		$questions = $this->createQuestions($genericUsers);
		$replies = $this->createReplies($genericUsers, $questions);
		
		for ($count = 2 *count($domains); 0 < $count; $count -= 1) {
			$this->randomEntry($domains)->addSubdomain($this->randomEntry($subDomains));
		}
		for ($count = 2 *count($questions); 0 < $count; $count -= 1) {
			$this->randomEntry($questions)->addSubDomain($this->randomEntry($subDomains));
		}
		for ($count = 2 *count($tutorials); 0 < $count; $count -= 1) {
			$this->randomEntry($tutorials)->addVoter($this->randomEntry($genericUsers));
		}
		for ($count = 2 *count($replies); 0 < $count; $count -= 1) {
			$this->randomEntry($replies)->addVoter($this->randomEntry($genericUsers));
		}
		
		array_map(fn($entity) => $entityManager->persist($entity['specialUser']), $specialUsers);
		array_map(fn($entity) => $entityManager->persist($entity), $genericUsers);
		array_map(fn($entity) => $entityManager->persist($entity), $domains);
		array_map(fn($entity) => $entityManager->persist($entity), $subDomains);
		array_map(fn($entity) => $entityManager->persist($entity), $tutorials);
		array_map(fn($entity) => $entityManager->persist($entity), $questions);
		array_map(fn($entity) => $entityManager->persist($entity), $replies);
		
		$entityManager->flush();
		return $this->json([
			'specialUsers' => array_map(
				fn($specialUser) => [
					'password' => $specialUser['plainPassword'],
					'username' => $specialUser['specialUser']->getUsername(),
				],
				$specialUsers
			),
		]);
	}
	
	// generate collections
	
	function createGenericUsers(UserPasswordEncoderInterface $passwordEncoder): array
	{
		$genericUsers = [];
		
		list($plainPassword, $encodedPassword) = $this->randomPassword($passwordEncoder);
		for ($count = 0; $count < 6 **5; $count += 1) {
			$genericUsers[] = $this->createUser($encodedPassword);
		}
		for ($count = 0; $count < 6 **2; $count += 1) {
			$genericUsers[] = $this->createAdminUser($encodedPassword);
		}
		
		return $genericUsers;
	}
	
	function createSpecialUsers(UserPasswordEncoderInterface $passwordEncoder): array
	{
		$specialUsers = [];
		
		list($plainPassword, $encodedPassword) = $this->randomPassword($passwordEncoder);
		$specialUser = $this->createAdminUser($encodedPassword);
		$specialUsers['admin'] = [
			'plainPassword' => $plainPassword,
			'specialUser' => $specialUser,
		];
		
		list($plainPassword, $encodedPassword) = $this->randomPassword($passwordEncoder);
		$specialUser = $this->createUser($encodedPassword);
		$specialUsers['alice'] = [
			'plainPassword' => $plainPassword,
			'specialUser' => $specialUser,
		];
		
		list($plainPassword, $encodedPassword) = $this->randomPassword($passwordEncoder);
		$specialUser = $this->createUser($encodedPassword);
		$specialUsers['bob'] = [
			'plainPassword' => $plainPassword,
			'specialUser' => $specialUser,
		];
		
		return $specialUsers;
	}
	
	function createTutorials(array $users): array
	{
		$tutorials = [];
		
		for ($count = 0; $count < 6 **3; $count += 1) {
			$tutorials[] = $this->createTutorial($this->randomEntry($users));
		}
		
		return $tutorials;
	}
	
	function createQuestions(array $users): array
	{
		$questions = [];
		
		for ($count = 0; $count < 6 **3; $count += 1) {
			$questions[] = $this->createQuestion($this->randomEntry($users));
		}
		
		return $questions;
	}
	
	function createReplies(array $users, array $questions): array
	{
		$replies = [];
		
		for ($count = 0; $count < 6 **4; $count += 1) {
			$replies[] = $this->createReply($this->randomEntry($users), $this->randomEntry($questions));
		}
		
		return $replies;
	}
	
	function createDomains(): array
	{
		$domains = [];
		
		for ($count = 0; $count < 6 **1; $count += 1) {
			$domains[] = $this->createDomain();
		}
			
		return $domains;
	}

	function createSubDomains(array $domains): array
	{
		$subDomains = [];
		
		for ($count = 0; $count < 6 **1; $count += 1) {
			$subDomains[] = $this->createSubDomain($this->randomEntry($domains));
		}
		
		return $subDomains;
	}
	
	// generate entities
	
	public function createAdminUser(string $encodedPassword): User
	{
		$user = $this->createUser($encodedPassword);
		
		$user->setRoles(['ROLE_ADMIN', ]);
		
		return $user;
	}
	
	public function createUser(string $encodedPassword): User
	{
		$user = new User();
		
		$user->setEmail(bin2hex(random_bytes(5)) . '@' . bin2hex(random_bytes(5)) . '.example');
		$user->setPassword($encodedPassword);
		$user->setLogin(bin2hex(random_bytes(5)));
		$user->setPicture('//image.invalid/'. bin2hex(random_bytes(5)));
		$user->setLastName(bin2hex(random_bytes(5)));
		$user->setFirstName(bin2hex(random_bytes(5)));
		$user->setTraining(bin2hex(random_bytes(5)));
		$user->setBirthDate($this->randomDateTime(1900, 2000));
		$user->setPhone($this->randomPhone());
		$user->setActualJob(bin2hex(random_bytes(5)));
		$user->setLinks(bin2hex(random_bytes(5)));
		$user->setLastConnection($this->randomDateTime(2000, 2020));
		$user->setRegistrationDate($this->randomDateTime(2000, 2020));
		$user->setArchivingDate(NULL);
		$user->setDesactivation(FALSE);
		$user->setNotificationCount(0);
		
		return $user;
	}
	
	public function createTutorial(User $user): Tutorial
	{
		$tutorial = new Tutorial();
		
		$tutorial->setIdentityUser($user);
		$tutorial->setTitle($this->randomText(1));
		$tutorial->setSummary($this->randomText(random_int(2, 6)));
		$tutorial->setTutorialDate($this->randomDateTime(2000, 2020));
		$tutorial->setTutorialContent($this->randomText(random_int(36, 216)));
		
		return $tutorial;
	}
	
	public function createQuestion(User $user): Question
	{
		$question = new Question();
		
		$question->setTitle($this->randomText(1));
		$question->setQuestionContent($this->randomText(random_int(8, 36)));
		$question->setQuestionDate($this->randomDateTime(2000, 2020));
		$question->setResolved(FALSE);
		$question->setIdentityUser($user);
		
		return $question;
	}
	
	public function createReply(User $user, Question $question): Reply
	{
		$reply = new Reply();
		
		$reply->setResponseContent($this->randomText(random_int(8, 36)));
		$reply->setResponseDate($this->randomDateTime(2000, 2020));
		$reply->setResponseNotification(FALSE);
		$reply->setQuestion($question);
		$reply->setIdentityUser($user);
		
		return $reply;
	}
	
	
	public function createDomain(): Domain
	{
		$domain = new Domain();
		
		$domain->setLabel($this->randomWord());
		$domain->setDomainCodeReference(rand(100, 999));
		
		return $domain;
	}
	
	public function createSubDomain(Domain $domain): SubDomain
	{
		$subDomain = new SubDomain();
		
		$subDomain->setLabelSubDomain($this->randomWord());
		$subDomain->setSubDomainCodeReference((rand(100, 999)));
		
		return $subDomain;
	}
	
	// helpers
	
	public function randomPassword(UserPasswordEncoderInterface $passwordEncoder): array
	{
		$plainPassword = bin2hex(random_bytes(20));
		$password = $passwordEncoder->encodePassword(new User(), $plainPassword);
		return [$plainPassword, $password];
	}
	
	public function randomPhone(): string
	{
		return implode('', [
			'0',
			strval(random_int(1, 9)),
			
			strval(random_int(0, 9)),
			strval(random_int(0, 9)),
			
			strval(random_int(0, 9)),
			strval(random_int(0, 9)),
			
			strval(random_int(0, 9)),
			strval(random_int(0, 9)),
			
			strval(random_int(0, 9)),
			strval(random_int(0, 9)),
		]);
	}
	
	public function randomDateTime(int $year_min, int $year_max): \DateTimeInterface
	{
		$timestamp_min = $this->yearToTimestamp($year_min);
		$timestamp_max = $this->yearToTimestamp($year_max);
		
		return (new \DateTimeImmutable())->setTimestamp(
			random_int($timestamp_min, $timestamp_max)
		);
	}
	
	public function randomText($limit): string
	{
		$text = [];
		
		for ($count = 0; $count < $limit; $count += 1) {
			$text[] = $this->randomSentence();
		}
		
		$text = implode('  ', $text);
		
		return $text;
	}
	
	public function randomSentence(): string
	{
		$sentence = [];
		
		for ($count = 0, $limit = random_int(6, 36); $count < $limit; $count += 1) {
			$sentence[] = $this->randomWord();
		}
		
		$sentence = implode(' ', $sentence);
		$sentence = ucfirst($sentence);
		$sentence = $sentence . '.';
		
		return $sentence;
	}
	
	public function randomWord(): string
	{
		$word = '';
		
		for ($count = 0, $limit = random_int(3, 12); $count < $limit; $count += 1) {
			$word .= ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', ][random_int(0, 25)];
		}
		
		return $word;
	}
	
	public function randomEntry(array $array)
	{
		return $array[random_int(0, count($array) -1)];
	}
	
	public function yearToTimestamp(int $year): int
	{
		$time = new \DateTimeImmutable();
		
		$time = $time->setTimezone(new \DateTimeZone('UTC'));
		$time = $time->setISODate($year, 1, 1);
		$time = $time->setTime(0, 0, 0, 0);
		
		return $time->getTimestamp();
	}
}
