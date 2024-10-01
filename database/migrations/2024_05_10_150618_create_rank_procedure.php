<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $procedure = '
            CREATE PROCEDURE GenrateRank()
            BEGIN
                DROP TABLE IF EXISTS generate_rank;
                CREATE TEMPORARY TABLE generate_rank
                SELECT row_number() OVER (ORDER BY j.user DESC) AS srno, j.id
                FROM (
                    SELECT r.id, r.name,
                        (SELECT COUNT(DISTINCT user_id) FROM passports p WHERE p.restro_id = r.id) AS user
                    FROM restaurants r
                    where r.status = 1 and r.deleted_at is null
                ) AS j;
                UPDATE restaurants r
                INNER JOIN generate_rank gr ON r.id = gr.id
                SET r.rank = IF(gr.srno > 0, gr.srno, r.rank);

                -- Procedure CheckSubscription
                update users set expire_date=null, subscription_status=0 where expire_date < date(now()) and subscription_status=1 and deleted_at is null;
                update restaurants set expire_date=null, subscription_status=0 where expire_date < date(now()) and subscription_status=1 and deleted_at is null;
                update user_coupons set status=2 where status=0 and end_date < date(now());

                -- Procedure CheckPassport
                update passports set status=0 where id IN (
                    select j.id from (
                    select p.*, (select count(id) from user_coupons uc where uc.status=0 and uc.passport_id=p.id) as record
                    from passports p
                    where p.status=1 and p.deleted_at is null
                    ) j where j.record = 0
                );
            END
        ';

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS GenrateRank');
    }
};
