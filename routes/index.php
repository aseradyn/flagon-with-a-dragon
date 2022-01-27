<section class="reading-width">
	<h1>
		<div class="welcome">
			Welcome!
		</div>

		I'm so glad you're here!
	</h1>

    <p style="text-align: center; padding-bottom: 20px;">
        I am your host, Jill Menning, serial hobbyist, notorious plotter and schemer.
    </p>

</section>

<section class="reading-width" style="margin-top: 20px;">

	<h2>
		Here's what I've been up to lately:
	</h2>
	
	<ul class="uptos">
		<li style="list-style-type: '👩‍💻'">
			I decided I didn't like my new web site after all, and started a new-new site built with SvelteKit! I'm learning some new stuff along
			the way, and having a great time. Of course, I inevitably ran into deployment issues when I decided to try hosting it (it's new, it's Node, it can get nasty), 
            so I ended up revamping my PHP site instead 😊
		</li>
		<li style="list-style-type: '🎧'">
			I binged all 24 episodes of <a href="https://boghouse.thehannah.org/">'The Boghouse'</a>, a podcast by and about a 
			couple who wanted to buy a theater and got a lot more than they bargained for. Finance! Archaeology! True crime! Shenanigans!
		</li>
		<li style="list-style-type: '🌵'">
			I visited my mother in Arizona over Christmas. I dragged her up to <a href="/photo/grand-canyon">the Grand Canyon</a>, which was beyond amazing,
			and we took up a new hobby: watercolors!
		</li>
		<li style="list-style-type: '🧶'">
			My local weaving guild, <a href="https://weavehouston.org">Contemporary Handweavers of Houston</a>, started up a new spinning group, and we had our first meeting. I'm super excited!
			It's a great mix of experience levels and interests, and we should all have a fabulous time learning from each other.
		</li>
		<li style="list-style-type: '👸'">
			Had a fabulous day at the Texas Renaissance Festival with a friend. I got to wear my big swishy skirt, we ate overpriced (but delicious) pretzels and jerkey, 
			and the weather was practically perfect.
		</li>
	</ul>

</section>

<style>
	section {
		border-bottom: 1px dashed rgb(255,255,255,0.3);
		width: 80vw;
		margin-left: auto;
		margin-right: auto;
	}
	section:last-of-type {
		border-bottom: 0px;
	}
	h1 {
		width: 100%;
	}
	.welcome {
		position: relative;
		width: 100%;
		color: var(--accent600);
	}
	.uptos {
		list-style-type: circle;
	}
	.uptos > li {
		margin-bottom: 20px;
		padding-left: 5px;
	}
	.uptos > li::marker {
		font-size: 1.3em;
	}
</style>