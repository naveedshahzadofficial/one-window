const state = {
    businesses: [],
}

const getters = {}

const actions = {
    getBusiness(context) {
        context.commit('setBusiness')
    }
}

const mutations = {
    setBusiness(state) {
        axios.get('business_list').then(response => {
            state.businesses = response.data.businesses
        });
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
