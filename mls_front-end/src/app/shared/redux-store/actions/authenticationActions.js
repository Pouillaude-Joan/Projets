export const AUTHENTICATE = 'AUTHENTICATE'
export const DECONNECTION = 'DECONNECTION'

export const signIn = (token) => ({
    type: AUTHENTICATE,
    payload: token
});

export const signOut = () => ({
    type: DECONNECTION
})