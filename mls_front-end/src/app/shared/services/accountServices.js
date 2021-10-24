import jwt from 'jsonwebtoken'
import { getToken } from './tokenServices';


export function isAuthenticated() {
    try{
        const token = getToken()
        return token

    } catch {
        return false
    }
    
}

export function getRole(role){
    const roles = localStorage.getItem("role").split(",")
    for(let i = 0; i<role.length ; i++){
        if (roles.includes(role[i])){
            return true
        } 
    }   
}