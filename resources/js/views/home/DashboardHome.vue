<template>
    <div>
        <!-- <Breadcrumb
            :title="'Hi, welcome back!'"
            :subtitle="'Sales monitoring dashboard template.'"

        /> -->
        <h1>Welcome to the Dashboard</h1>
        <p>This is the main dashboard page.</p>
        		<div class="row row-sm">
						<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
							<div class="card overflow-hidden sales-card bg-primary-gradient">
								<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
									<div class="">
										<h6 class="mb-3 tx-12 text-white">TODAY ORDERS</h6>
									</div>
									<div class="pb-0 mt-0">
										<div class="d-flex">
											<div class="">
												<h4 class="tx-20 font-weight-bold mb-1 text-white">$5,74.12</h4>
												<p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
											</div>
											<span class="float-right my-auto mr-auto">
												<i class="fas fa-arrow-circle-up text-white"></i>
												<span class="text-white op-7"> +427</span>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
							<div class="card overflow-hidden sales-card bg-danger-gradient">
								<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
									<div class="">
										<h6 class="mb-3 tx-12 text-white">TODAY EARNINGS</h6>
									</div>
									<div class="pb-0 mt-0">
										<div class="d-flex">
											<div class="">
												<h4 class="tx-20 font-weight-bold mb-1 text-white">$1,230.17</h4>
												<p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
											</div>
											<span class="float-right my-auto mr-auto">
												<i class="fas fa-arrow-circle-down text-white"></i>
												<span class="text-white op-7"> -23.09%</span>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
							<div class="card overflow-hidden sales-card bg-success-gradient">
								<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
									<div class="">
										<h6 class="mb-3 tx-12 text-white">TOTAL EARNINGS</h6>
									</div>
									<div class="pb-0 mt-0">
										<div class="d-flex">
											<div class="">
												<h4 class="tx-20 font-weight-bold mb-1 text-white">$7,125.70</h4>
												<p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
											</div>
											<span class="float-right my-auto mr-auto">
												<i class="fas fa-arrow-circle-up text-white"></i>
												<span class="text-white op-7"> 52.09%</span>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
							<div class="card overflow-hidden sales-card bg-warning-gradient">
								<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
									<div class="">
										<h6 class="mb-3 tx-12 text-white">PRODUCT SOLD</h6>
									</div>
									<div class="pb-0 mt-0">
										<div class="d-flex">
											<div class="">
												<h4 class="tx-20 font-weight-bold mb-1 text-white">$4,820.50</h4>
												<p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
											</div>
											<span class="float-right my-auto mr-auto">
												<i class="fas fa-arrow-circle-down text-white"></i>
												<span class="text-white op-7"> -152.3</span>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
    </div>
</template>

<script>
import Breadcrumb from "../../components/Breadcrumb.vue";
export default {
    components: {
        Breadcrumb,
    },
    name: "DashboardHome",
};
</script>
