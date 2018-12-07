<?php

use yii\db\Migration;

/**
 * Class m181206_151333_rosnedoros
 */
class m181206_151333_parsing extends Migration {

	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {

		$tableOptions = null;
		//Опции для mysql
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}
		$this->createTable('{{%parsing}}', [
			'cadastral_number' => $this->string(255)->notNull(),
			'address' => $this->string(255),
			'price' => $this->string(255),
			'area' => $this->integer(),
				], $tableOptions);
		$this->addPrimaryKey('pk_cadastral_number', '{{%parsing}}', ['cadastral_number']);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		$this->dropTable('{{%parsing}}');
	}

	/*
	  // Use up()/down() to run migration code without a transaction.
	  public function up()
	  {

	  }

	  public function down()
	  {
	  echo "m181206_151333_rosnedoros cannot be reverted.\n";

	  return false;
	  }
	 */
}
