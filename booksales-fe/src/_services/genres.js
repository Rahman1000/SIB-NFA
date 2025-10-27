import API from '../_api';

export const getGenres = async () => {
    const { data } = await API.get('/genres')
    return data.data;
}

export const createGenre = async (data) => {
    try {
        const response = await API.post('/genres', data);
        return response.data;
    } catch (error) {
        console.log(error);
        throw error
    }
}

export const showAuthor = async (id) => {
    try {
        const { data } = await API.get(`/authors/${id}`)
        return data.data
    } catch (error) {
        console.log(error);
        throw error
    } 
}

export const updateAuthor = async (id, data) => {
    try {
        const response = await API.post(`/authors/${id}`, data)
    } catch (error) {
        console.log(error);
        throw error
    } 
}

export const deleteAuthor = async (id) => {
    try {
        await API.delete(`/authors/${id}`)
    } catch (error) {
        console.log(error);
        throw error
    } 
}