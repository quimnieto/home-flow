<?php

declare(strict_types=1);

namespace Tests\Backoffice\Clients\Application\Create;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Qm\Backoffice\Clients\Application\Create\ClientCreator;
use Qm\Backoffice\Clients\Application\Create\CreateClientCommand;
use Qm\Backoffice\Clients\Domain\Repository\ClientRepository;
use Qm\Shared\Domain\Bus\Event\EventBus;
use Tests\Backoffice\Clients\Domain\Aggregate\ClientMother;

class ClientCreatorTest extends TestCase
{
    private MockObject $repository;
    private MockObject $bus;
    private ClientCreator $sut;

    protected function setUp(): void
    {
        parent::setUp();

        $this->repository = $this->createMock(ClientRepository::class);
        $this->bus = $this->createMock(EventBus::class);

        $this->sut = new ClientCreator($this->repository, $this->bus);
    }

    public function test_create_new_client(): void
    {
        $command = new CreateClientCommand(
            '14f3c42e-366a-4e3b-ae54-94f0f67efc27',
            'Juan',
            'Palomo'
        );

        $client = ClientMother::create(
            $command->id,
            $command->firstName,
            $command->lastName
        );

        $this->repository
            ->expects(self::once())
            ->method('save')
            ->with($client);

        $this->sut->create($command);
    }
}
