import { db } from '$lib/server/db';
import { user } from '$lib/server/db/schema';
import { fail } from '@sveltejs/kit';
import { eq } from 'drizzle-orm';

	const ctfCodes = [
		'always_chang3_y0ur_default_passw0rds',
		'',
		'th1s_file_validation_1s_really_weak',
		'said_tasuta_s4rgi!',
		'found_the_secret_image'
	];

export const actions = {
    default: async ({ request, locals }) => {
        const formData = await request.formData();
        const ctfCode = formData.get('ctfCode');
        
        // Example user ID retrieval (replace with your own logic)
        const userId = locals.session?.userId;
        if (!userId) {
            return fail(401, { message: 'User not logged in.' });
        }
        
        const index = ctfCodes.indexOf(ctfCode as string);
        if (index >= 0) {
            try {
                switch (index) {

                case 0:
                    await db.update(user)
                        .set({ ctfDone0: 1 })
                        .where(eq(user.id, userId));
                    break;
                case 1:
                    await db.update(user)
                        .set({ ctfDone1: 1 })
                        .where(eq(user.id, userId));
                    break;
                case 2:
                    await db.update(user)
                        .set({ ctfDone2: 1 })
                        .where(eq(user.id, userId));
                    break;
                case 3:
                    await db.update(user)
                        .set({ ctfDone3: 1 })
                        .where(eq(user.id, userId));
                    break;
                case 4:
                    await db.update(user)
                        .set({ ctfDone4: 1 })
                        .where(eq(user.id, userId));
                    break;
            }
            } catch (error) {
                return fail(500, { message: 'Database error: ' +    String(error) });
            }
        }
        
        return { success: true };
    }
};