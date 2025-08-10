<template>
    <div class="flex space-x-1 items-center">
        <i
            v-for="star in 5"
            :key="star"
            :class="[
        'fa-star',
        star <= hoverRating ? 'fas text-yellow-500' :
        (star <= selectedRating ? 'fas text-yellow-400' : 'far text-gray-300'),
        'cursor-pointer', 'transition-colors'
      ]"
            @mouseover="hoverRating = star"
            @mouseleave="hoverRating = selectedRating"
            @click="rate(star)"
        ></i>
        <span class="text-blue-500 px-1">ratings {{totalRating}}</span>
        <span v-if="status" class="ml-2 text-sm text-gray-500">{{ status }}</span>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    props: {
        productId: { type: Number, required: true },
        userRating: { type: Number, default: 0 },
        averageRating: { type: Number, default: 0 },
    },
    data() {
        return {
            selectedRating: this.averageRating,
            hoverRating: this.averageRating,
            totalRating:this.userRating,
            debounceTimer: null,
            status: null,
        };
    },
    methods: {
        rate(star) {
            this.selectedRating = star;
            this.hoverRating = star;
            this.status = 'Submitting...';

            // Debounce submission
            if (this.debounceTimer) clearTimeout(this.debounceTimer);
            this.debounceTimer = setTimeout(() => this.submitRating(star), 800);
        },
        async submitRating(rating) {
            try {
                await axios.post(`/product/${this.productId}/rating`, {
                    rating: rating,
                }).then(res=>{
                    this.selectedRating=res.data['average'];
                    this.totalRating=res.data['total'];

                    console.log(res['data'])
                    console.log(res['average'])
                    console.log(res['total'])
                });
                this.status = 'Rated';
            } catch (err) {
                this.status = 'Submission failed.';
                console.error(err);
            }

            setTimeout(() => (this.status = null), 1000);
        },
    },
};
</script>

<style scoped>
/* Optional: transition effect */
i {
    transition: color 0.2s ease;
}
</style>


