<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220324200252 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE placed_at DROP FOREIGN KEY Placed_at_company0_FK');
        $this->addSql('DROP INDEX placed_at_company0_fk ON placed_at');
        $this->addSql('CREATE INDEX IDX_9BB7460D883B4F92 ON placed_at (ID_comp)');
        $this->addSql('ALTER TABLE placed_at ADD CONSTRAINT Placed_at_company0_FK FOREIGN KEY (ID_comp) REFERENCES company (ID_comp)');
        $this->addSql('ALTER TABLE centers CHANGE ID_addr ID_addr INT DEFAULT NULL');
        $this->addSql('ALTER TABLE from_center_de DROP FOREIGN KEY From_center_de_delegate0_FK');
        $this->addSql('DROP INDEX from_center_de_delegate0_fk ON from_center_de');
        $this->addSql('CREATE INDEX IDX_8B072816C69C026C ON from_center_de (ID_delegate)');
        $this->addSql('ALTER TABLE from_center_de ADD CONSTRAINT From_center_de_delegate0_FK FOREIGN KEY (ID_delegate) REFERENCES delegate (ID_delegate)');
        $this->addSql('ALTER TABLE delegate CHANGE ID_user ID_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offer CHANGE ID_comp ID_comp INT DEFAULT NULL');
        $this->addSql('ALTER TABLE apply DROP FOREIGN KEY apply_Students0_FK');
        $this->addSql('DROP INDEX apply_students0_fk ON apply');
        $this->addSql('CREATE INDEX IDX_BD2F8C1FA4128730 ON apply (ID_student)');
        $this->addSql('ALTER TABLE apply ADD CONSTRAINT apply_Students0_FK FOREIGN KEY (ID_student) REFERENCES students (ID_student)');
        $this->addSql('ALTER TABLE pilot CHANGE ID_center ID_center INT DEFAULT NULL, CHANGE ID_user ID_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE proms CHANGE ID_pilot ID_pilot INT DEFAULT NULL, CHANGE ID_center ID_center INT DEFAULT NULL');
        $this->addSql('ALTER TABLE need DROP FOREIGN KEY need_offer0_FK');
        $this->addSql('DROP INDEX need_offer0_fk ON need');
        $this->addSql('CREATE INDEX IDX_E6F46C44F1989DC4 ON need (ID_offer)');
        $this->addSql('ALTER TABLE need ADD CONSTRAINT need_offer0_FK FOREIGN KEY (ID_offer) REFERENCES offer (ID_offer)');
        $this->addSql('ALTER TABLE students CHANGE ID_user ID_user INT DEFAULT NULL, CHANGE ID_prom ID_prom VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY users_address_FK');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY users_Type_User0_FK');
        $this->addSql('DROP INDEX users_address_FK ON users');
        $this->addSql('DROP INDEX users_Type_User0_FK ON users');
        $this->addSql('ALTER TABLE users ADD user VARCHAR(50) NOT NULL, ADD pwd VARCHAR(255) NOT NULL, ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', DROP Name_user, DROP First_name_user, DROP ID_conn_user, DROP Password, DROP ID_addr, DROP ID_Type');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address CHANGE City City VARCHAR(50) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE Street Street VARCHAR(50) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE apply DROP FOREIGN KEY FK_BD2F8C1FA4128730');
        $this->addSql('DROP INDEX idx_bd2f8c1fa4128730 ON apply');
        $this->addSql('CREATE INDEX apply_Students0_FK ON apply (ID_student)');
        $this->addSql('ALTER TABLE apply ADD CONSTRAINT FK_BD2F8C1FA4128730 FOREIGN KEY (ID_student) REFERENCES students (ID_student)');
        $this->addSql('ALTER TABLE centers CHANGE Nom_center Nom_center VARCHAR(50) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE ID_addr ID_addr INT NOT NULL');
        $this->addSql('ALTER TABLE company CHANGE Name_comp Name_comp VARCHAR(50) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE Sector Sector VARCHAR(50) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE Grade_student Grade_student CHAR(2) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE Grade_pilot Grade_pilot CHAR(2) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE delegate CHANGE ID_user ID_user INT NOT NULL');
        $this->addSql('ALTER TABLE from_center_de DROP FOREIGN KEY FK_8B072816C69C026C');
        $this->addSql('DROP INDEX idx_8b072816c69c026c ON from_center_de');
        $this->addSql('CREATE INDEX From_center_de_delegate0_FK ON from_center_de (ID_delegate)');
        $this->addSql('ALTER TABLE from_center_de ADD CONSTRAINT FK_8B072816C69C026C FOREIGN KEY (ID_delegate) REFERENCES delegate (ID_delegate)');
        $this->addSql('ALTER TABLE need DROP FOREIGN KEY FK_E6F46C44F1989DC4');
        $this->addSql('DROP INDEX idx_e6f46c44f1989dc4 ON need');
        $this->addSql('CREATE INDEX need_offer0_FK ON need (ID_offer)');
        $this->addSql('ALTER TABLE need ADD CONSTRAINT FK_E6F46C44F1989DC4 FOREIGN KEY (ID_offer) REFERENCES offer (ID_offer)');
        $this->addSql('ALTER TABLE offer CHANGE Name_offer Name_offer VARCHAR(50) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE ID_comp ID_comp INT NOT NULL');
        $this->addSql('ALTER TABLE pilot CHANGE ID_center ID_center INT NOT NULL, CHANGE ID_user ID_user INT NOT NULL');
        $this->addSql('ALTER TABLE placed_at DROP FOREIGN KEY FK_9BB7460D883B4F92');
        $this->addSql('DROP INDEX idx_9bb7460d883b4f92 ON placed_at');
        $this->addSql('CREATE INDEX Placed_at_company0_FK ON placed_at (ID_comp)');
        $this->addSql('ALTER TABLE placed_at ADD CONSTRAINT FK_9BB7460D883B4F92 FOREIGN KEY (ID_comp) REFERENCES company (ID_comp)');
        $this->addSql('ALTER TABLE proms CHANGE ID_prom ID_prom VARCHAR(50) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE ID_pilot ID_pilot INT NOT NULL, CHANGE ID_center ID_center INT NOT NULL');
        $this->addSql('ALTER TABLE skills CHANGE Skill_Name Skill_Name VARCHAR(50) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE students CHANGE ID_prom ID_prom VARCHAR(50) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE ID_user ID_user INT NOT NULL');
        $this->addSql('ALTER TABLE type_user CHANGE Name_Type Name_Type VARCHAR(50) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE users ADD Name_user VARCHAR(50) NOT NULL COLLATE `utf8mb4_general_ci`, ADD First_name_user VARCHAR(50) NOT NULL COLLATE `utf8mb4_general_ci`, ADD ID_conn_user VARCHAR(50) NOT NULL COLLATE `utf8mb4_general_ci`, ADD Password VARCHAR(50) NOT NULL COLLATE `utf8mb4_general_ci`, ADD ID_addr INT NOT NULL, ADD ID_Type INT NOT NULL, DROP user, DROP pwd, DROP roles');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT users_address_FK FOREIGN KEY (ID_addr) REFERENCES address (ID_addr)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT users_Type_User0_FK FOREIGN KEY (ID_Type) REFERENCES type_user (ID_Type)');
        $this->addSql('CREATE INDEX users_address_FK ON users (ID_addr)');
        $this->addSql('CREATE INDEX users_Type_User0_FK ON users (ID_Type)');
    }
}
