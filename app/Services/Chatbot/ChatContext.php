<?php

namespace App\Services\Chatbot;

class ChatContext
{
    public function __construct(
        public readonly string $rawMessage,
        public readonly string $normalizedMessage,
        public readonly ?string $intent = null,
        public readonly ?array $intentScores = null,
        public readonly ?array $cabor = null,
        public readonly ?array $venue = null,
        public readonly ?string $facilityType = null,
        public readonly ?string $unregisteredSport = null,
        public readonly ?string $sessionCabor = null,
        public readonly ?string $sessionVenue = null
    ) {}

    public function hasCabor(): bool
    {
        return $this->cabor !== null;
    }

    public function hasVenue(): bool
    {
        return $this->venue !== null;
    }

    public function hasFacilityType(): bool
    {
        return $this->facilityType !== null;
    }

    public function hasUnregisteredSport(): bool
    {
        return $this->unregisteredSport !== null;
    }

    public function hasIntent(): bool
    {
        return $this->intent !== null;
    }

    public function intentIs(string $intent): bool
    {
        return $this->intent === $intent;
    }

    public function intentIn(array $intents): bool
    {
        return in_array($this->intent, $intents);
    }

    public function getActiveVenueName(): ?string
    {
        if ($this->venue) {
            return $this->venue['nama'];
        }
        if ($this->cabor) {
            return $this->cabor['venue'];
        }
        return $this->sessionVenue;
    }
}
