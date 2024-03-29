<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221102191651 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE task_type (task_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_FF6DC3528DB60186 (task_id), INDEX IDX_FF6DC352C54C8C93 (type_id), PRIMARY KEY(task_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE task_type ADD CONSTRAINT FK_FF6DC3528DB60186 FOREIGN KEY (task_id) REFERENCES task (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE task_type ADD CONSTRAINT FK_FF6DC352C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE task_type DROP FOREIGN KEY FK_FF6DC3528DB60186');
        $this->addSql('ALTER TABLE task_type DROP FOREIGN KEY FK_FF6DC352C54C8C93');
        $this->addSql('DROP TABLE task_type');
    }
}
