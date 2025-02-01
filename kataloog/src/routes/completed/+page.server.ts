import { db } from '$lib/server/db';
import { user } from '$lib/server/db/schema';
import { fail } from '@sveltejs/kit';

const ctfCodes = ['this_is_done', 'this_is_not_done', 'might_be_done'];

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
                        .where(user.id.eq(userId));
                    break;
                case 1:
                    await db.update(user)
                        .set({ ctfDone1: 1 })
                        .where(user.id.eq(userId));
                    break;
                case 2:
                    await db.update(user)
                        .set({ ctfDone2: 1 })
                        .where(user.id.eq(userId));
                    break;
            }
            } catch (error) {
                return fail(500, { message: 'Database error: ' +    String(error) });
            }
        }
        
        return { success: true };
    }
};