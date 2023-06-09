<?php
namespace Model; // afin que l'autoload puisse retrouver notre classe. Model correspond au nom du dossier

class MotherBoard extends Component
{
	protected ?string $socket = null;
	protected ?string $format = null;

	//Méthodes (Set et Get)

	public function getSocket(): ?string
	{
		return $this->socket;
	}

	public function setSocket(string $socket): self
	{
		$this->socket = $socket;
		return $this;
	}

	public function getFormat(): ?string
	{
		return $this->format;
	}

	public function setFormat(string $format): self
	{
		$this->format = $format;
		return $this;
	}
	public function GetCategory(): string
	{
		return self::MOTHER_BOARD;
	}

}