<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220414164150 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE cadre_legal_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cible_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cible_par_mission_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE communication_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE communication_par_mission_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE demandeur_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE effectif_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE effectif_categorie_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE effectif_par_mission_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE effectif_pirogier_par_mission_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE effectif_sous_categorie_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE etat_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE fiche_ode_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE force_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE manoeuvre_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE manoeuvre_par_mission_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE transport_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE transport_par_mission_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE transport_sous_categorie_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE type_mission_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE cadre_legal (id INT NOT NULL, libelle VARCHAR(45) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE cible (id INT NOT NULL, latitude_n VARCHAR(20) NOT NULL, longitude_o VARCHAR(20) NOT NULL, libelle VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE cible_par_mission (id INT NOT NULL, numero_mission_id INT NOT NULL, cible_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_835622EEDE913333 ON cible_par_mission (numero_mission_id)');
        $this->addSql('CREATE INDEX IDX_835622EEA96E5E09 ON cible_par_mission (cible_id)');
        $this->addSql('CREATE TABLE communication (id INT NOT NULL, nom VARCHAR(20) NOT NULL, info TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE communication_par_mission (id INT NOT NULL, numero_mission_id INT NOT NULL, communication_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DFB8486EDE913333 ON communication_par_mission (numero_mission_id)');
        $this->addSql('CREATE INDEX IDX_DFB8486E1C2D1E0C ON communication_par_mission (communication_id)');
        $this->addSql('CREATE TABLE demandeur (id INT NOT NULL, numero_identifiant_gendarme VARCHAR(200) NOT NULL, role VARCHAR(45) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE effectif (id INT NOT NULL, effectif_categorie_id INT NOT NULL, effectif_sous_categorie_id INT DEFAULT NULL, volume INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F0B590F173E9D9D6 ON effectif (effectif_categorie_id)');
        $this->addSql('CREATE INDEX IDX_F0B590F1752BC003 ON effectif (effectif_sous_categorie_id)');
        $this->addSql('CREATE TABLE effectif_categorie (id INT NOT NULL, libelle VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE effectif_par_mission (id INT NOT NULL, numero_mission_id INT NOT NULL, effectif_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5273C91CDE913333 ON effectif_par_mission (numero_mission_id)');
        $this->addSql('CREATE INDEX IDX_5273C91C180D113E ON effectif_par_mission (effectif_id)');
        $this->addSql('CREATE TABLE effectif_pirogier_par_mission (id INT NOT NULL, numero_mission_id INT NOT NULL, effectif_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_BA9DE7F3DE913333 ON effectif_pirogier_par_mission (numero_mission_id)');
        $this->addSql('CREATE INDEX IDX_BA9DE7F3180D113E ON effectif_pirogier_par_mission (effectif_id)');
        $this->addSql('CREATE TABLE effectif_sous_categorie (id INT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE etat (id INT NOT NULL, libelle VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE fiche_ode (id INT NOT NULL, demandeur_id INT NOT NULL, type_mission_id INT NOT NULL, force_id INT NOT NULL, etat_id INT NOT NULL, cadre_legal_id INT NOT NULL, numero_mission VARCHAR(255) NOT NULL, date_demande TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, denomination_operation TEXT DEFAULT NULL, date_debut TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, date_fin TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, observation TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E553DCFF95A6EE59 ON fiche_ode (demandeur_id)');
        $this->addSql('CREATE INDEX IDX_E553DCFFA36F78B5 ON fiche_ode (type_mission_id)');
        $this->addSql('CREATE INDEX IDX_E553DCFF3D8F01D ON fiche_ode (force_id)');
        $this->addSql('CREATE INDEX IDX_E553DCFFD5E86FF ON fiche_ode (etat_id)');
        $this->addSql('CREATE INDEX IDX_E553DCFFE2C4CE08 ON fiche_ode (cadre_legal_id)');
        $this->addSql('CREATE TABLE force (id INT NOT NULL, libelle VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE manoeuvre (id INT NOT NULL, libelle VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE manoeuvre_par_mission (id INT NOT NULL, numero_mission_id INT NOT NULL, manoeuvre_id INT NOT NULL, execution TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E16512F5DE913333 ON manoeuvre_par_mission (numero_mission_id)');
        $this->addSql('CREATE INDEX IDX_E16512F5FD4C8FF4 ON manoeuvre_par_mission (manoeuvre_id)');
        $this->addSql('CREATE TABLE transport (id INT NOT NULL, sous_categorie_id INT NOT NULL, categorie VARCHAR(45) NOT NULL, appui_feu BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_66AB212E365BF48 ON transport (sous_categorie_id)');
        $this->addSql('CREATE TABLE transport_par_mission (id INT NOT NULL, numero_mission_id INT NOT NULL, transport_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_62B6482DDE913333 ON transport_par_mission (numero_mission_id)');
        $this->addSql('CREATE INDEX IDX_62B6482D9909C13F ON transport_par_mission (transport_id)');
        $this->addSql('CREATE TABLE transport_sous_categorie (id INT NOT NULL, libelle VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE type_mission (id INT NOT NULL, libelle VARCHAR(200) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('ALTER TABLE cible_par_mission ADD CONSTRAINT FK_835622EEDE913333 FOREIGN KEY (numero_mission_id) REFERENCES fiche_ode (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cible_par_mission ADD CONSTRAINT FK_835622EEA96E5E09 FOREIGN KEY (cible_id) REFERENCES cible (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE communication_par_mission ADD CONSTRAINT FK_DFB8486EDE913333 FOREIGN KEY (numero_mission_id) REFERENCES fiche_ode (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE communication_par_mission ADD CONSTRAINT FK_DFB8486E1C2D1E0C FOREIGN KEY (communication_id) REFERENCES communication (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE effectif ADD CONSTRAINT FK_F0B590F173E9D9D6 FOREIGN KEY (effectif_categorie_id) REFERENCES effectif_categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE effectif ADD CONSTRAINT FK_F0B590F1752BC003 FOREIGN KEY (effectif_sous_categorie_id) REFERENCES effectif_sous_categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE effectif_par_mission ADD CONSTRAINT FK_5273C91CDE913333 FOREIGN KEY (numero_mission_id) REFERENCES fiche_ode (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE effectif_par_mission ADD CONSTRAINT FK_5273C91C180D113E FOREIGN KEY (effectif_id) REFERENCES effectif (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE effectif_pirogier_par_mission ADD CONSTRAINT FK_BA9DE7F3DE913333 FOREIGN KEY (numero_mission_id) REFERENCES fiche_ode (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE effectif_pirogier_par_mission ADD CONSTRAINT FK_BA9DE7F3180D113E FOREIGN KEY (effectif_id) REFERENCES effectif (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE fiche_ode ADD CONSTRAINT FK_E553DCFF95A6EE59 FOREIGN KEY (demandeur_id) REFERENCES demandeur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE fiche_ode ADD CONSTRAINT FK_E553DCFFA36F78B5 FOREIGN KEY (type_mission_id) REFERENCES type_mission (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE fiche_ode ADD CONSTRAINT FK_E553DCFF3D8F01D FOREIGN KEY (force_id) REFERENCES force (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE fiche_ode ADD CONSTRAINT FK_E553DCFFD5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE fiche_ode ADD CONSTRAINT FK_E553DCFFE2C4CE08 FOREIGN KEY (cadre_legal_id) REFERENCES cadre_legal (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE manoeuvre_par_mission ADD CONSTRAINT FK_E16512F5DE913333 FOREIGN KEY (numero_mission_id) REFERENCES fiche_ode (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE manoeuvre_par_mission ADD CONSTRAINT FK_E16512F5FD4C8FF4 FOREIGN KEY (manoeuvre_id) REFERENCES manoeuvre (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE transport ADD CONSTRAINT FK_66AB212E365BF48 FOREIGN KEY (sous_categorie_id) REFERENCES transport_sous_categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE transport_par_mission ADD CONSTRAINT FK_62B6482DDE913333 FOREIGN KEY (numero_mission_id) REFERENCES fiche_ode (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE transport_par_mission ADD CONSTRAINT FK_62B6482D9909C13F FOREIGN KEY (transport_id) REFERENCES transport (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE fiche_ode DROP CONSTRAINT FK_E553DCFFE2C4CE08');
        $this->addSql('ALTER TABLE cible_par_mission DROP CONSTRAINT FK_835622EEA96E5E09');
        $this->addSql('ALTER TABLE communication_par_mission DROP CONSTRAINT FK_DFB8486E1C2D1E0C');
        $this->addSql('ALTER TABLE fiche_ode DROP CONSTRAINT FK_E553DCFF95A6EE59');
        $this->addSql('ALTER TABLE effectif_par_mission DROP CONSTRAINT FK_5273C91C180D113E');
        $this->addSql('ALTER TABLE effectif_pirogier_par_mission DROP CONSTRAINT FK_BA9DE7F3180D113E');
        $this->addSql('ALTER TABLE effectif DROP CONSTRAINT FK_F0B590F173E9D9D6');
        $this->addSql('ALTER TABLE effectif DROP CONSTRAINT FK_F0B590F1752BC003');
        $this->addSql('ALTER TABLE fiche_ode DROP CONSTRAINT FK_E553DCFFD5E86FF');
        $this->addSql('ALTER TABLE cible_par_mission DROP CONSTRAINT FK_835622EEDE913333');
        $this->addSql('ALTER TABLE communication_par_mission DROP CONSTRAINT FK_DFB8486EDE913333');
        $this->addSql('ALTER TABLE effectif_par_mission DROP CONSTRAINT FK_5273C91CDE913333');
        $this->addSql('ALTER TABLE effectif_pirogier_par_mission DROP CONSTRAINT FK_BA9DE7F3DE913333');
        $this->addSql('ALTER TABLE manoeuvre_par_mission DROP CONSTRAINT FK_E16512F5DE913333');
        $this->addSql('ALTER TABLE transport_par_mission DROP CONSTRAINT FK_62B6482DDE913333');
        $this->addSql('ALTER TABLE fiche_ode DROP CONSTRAINT FK_E553DCFF3D8F01D');
        $this->addSql('ALTER TABLE manoeuvre_par_mission DROP CONSTRAINT FK_E16512F5FD4C8FF4');
        $this->addSql('ALTER TABLE transport_par_mission DROP CONSTRAINT FK_62B6482D9909C13F');
        $this->addSql('ALTER TABLE transport DROP CONSTRAINT FK_66AB212E365BF48');
        $this->addSql('ALTER TABLE fiche_ode DROP CONSTRAINT FK_E553DCFFA36F78B5');
        $this->addSql('DROP SEQUENCE cadre_legal_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cible_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cible_par_mission_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE communication_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE communication_par_mission_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE demandeur_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE effectif_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE effectif_categorie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE effectif_par_mission_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE effectif_pirogier_par_mission_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE effectif_sous_categorie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE etat_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE fiche_ode_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE force_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE manoeuvre_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE manoeuvre_par_mission_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE transport_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE transport_par_mission_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE transport_sous_categorie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_mission_id_seq CASCADE');
        $this->addSql('DROP TABLE cadre_legal');
        $this->addSql('DROP TABLE cible');
        $this->addSql('DROP TABLE cible_par_mission');
        $this->addSql('DROP TABLE communication');
        $this->addSql('DROP TABLE communication_par_mission');
        $this->addSql('DROP TABLE demandeur');
        $this->addSql('DROP TABLE effectif');
        $this->addSql('DROP TABLE effectif_categorie');
        $this->addSql('DROP TABLE effectif_par_mission');
        $this->addSql('DROP TABLE effectif_pirogier_par_mission');
        $this->addSql('DROP TABLE effectif_sous_categorie');
        $this->addSql('DROP TABLE etat');
        $this->addSql('DROP TABLE fiche_ode');
        $this->addSql('DROP TABLE force');
        $this->addSql('DROP TABLE manoeuvre');
        $this->addSql('DROP TABLE manoeuvre_par_mission');
        $this->addSql('DROP TABLE transport');
        $this->addSql('DROP TABLE transport_par_mission');
        $this->addSql('DROP TABLE transport_sous_categorie');
        $this->addSql('DROP TABLE type_mission');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
