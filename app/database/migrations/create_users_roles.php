/**
 *
 *@return void
 *
 */

public function up()
{
	Schema::create('user_role', function(Blueprint $table) {
		$table->increment('id');
		$table->string('name');
		$table->string('email');
		$table->timestamp();
})

}


public function down()
{

	Schema::drop('users');
}