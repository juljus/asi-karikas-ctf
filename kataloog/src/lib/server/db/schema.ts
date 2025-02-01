import { mysqlTable, serial, text, int, varchar, datetime } from 'drizzle-orm/mysql-core';

export const user = mysqlTable('user', {
	id: varchar('id', { length: 255 }).primaryKey(),
	username: varchar('username', { length: 32 }).notNull().unique(),
	passwordHash: varchar('password_hash', { length: 255 }).notNull(),
	ctfDone0: int('ctf_done0').default(0),
	ctfDone1: int('ctf_done1').default(0),
	ctfDone2: int('ctf_done2').default(0),
	ctfDone3: int('ctf_done3').default(0),
	ctfDone4: int('ctf_done4').default(0)
});

export const session = mysqlTable('session', {
	id: varchar('id', { length: 255 }).primaryKey(),
	userId: varchar('user_id', { length: 255 })
		.notNull()
		.references(() => user.id),
	expiresAt: datetime('expires_at').notNull()
});

export type Session = typeof session.$inferSelect;

export type User = typeof user.$inferSelect;
