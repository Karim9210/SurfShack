<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221215155139 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE surf_board ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE surf_board ADD CONSTRAINT FK_217F593DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_217F593DA76ED395 ON surf_board (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE surf_board DROP FOREIGN KEY FK_217F593DA76ED395');
        $this->addSql('DROP INDEX IDX_217F593DA76ED395 ON surf_board');
        $this->addSql('ALTER TABLE surf_board DROP user_id');
    }
}
