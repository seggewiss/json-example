import template from './sw-dashboard-index.html.twig';

const { Component } = Shopware;
const { Criteria } = Shopware.Data;

Component.override('sw-dashboard-index', {
    template,

    computed: {
        testRepository() {
            return this.repositoryFactory.create('test');
        },
    },

    data() {
        return {
            tags: [],
            selectedTag: null,
        }
    },

    methods: {
        createdComponent() {
            this.$super('createdComponent');

            this.testRepository.search(new Criteria(), Shopware.Context.api).then((collection) => {
                // this.tags = collection.first().tags;

                // Enable this line to get none empty tags
                this.tags = collection.last().tags;

                console.log('Tags: ', this.tags);
            })
        },
    },
});
