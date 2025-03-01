# Unsolicited Advice: On Daily Stand-Ups

The most hated meetings in all of software development, if you believe people on Reddit, is the daily scrum.

In theory, the daily scrum is supposed to align the team, make sure everyone knows what is going on and how they can contribute. But the way these meetings are usually run just does not accomplish that.  Instead, it mostly seems to become a 'prove you're working' meeting so that the team's manager feels like they are doing their job.

Hot take: Stand-ups can be good, but only if they are actually designed to meet the team's goals.

## The Problems with Scrum

Here's how most morning scrums / standups I've heard about seem to go:

* Everyone stands in a circle
* One by one, each person says what they did yesterday, what they are doing today, and whether they are blocked. They try to say enough to make it sounds like they are doing meaningful work, because their manager is listening.
* A manager (team supervisor or product manager, etc) may ask a lot of questions or pass judgement
* The team disperses after half an hour

I'm with Reddit - I hate this type of meeting. I've been on teams using it, and it's pretty awful.

* This style of standup is really hard to follow. People who are working on related stories - or the same story - are not standing next to each other, so you have to try to piece together the status of the story/stories from comments made several minutes apart.
* This style of standup makes people feel like they are children reporting to their parents rather than professionals trusted to complete their work.
* Because of the difficulty understanding the state of work, most of the team members have probably given up trying to follow the discussion and are bored to tears when they're not talking, and possibly slightly terrified when it's their turn.

## A Better Way

There is a better way: Walk the board.

Walking the board is a style of stand-up that is usually part of a Kanban process, but it doesn't have to be. In these stand-ups, instead of going around the room, the stories on the board are discussed in order, from top to bottom. Anyone who is working on the story can speak up to add an update. By the end of the meeting, there is a clear narrative about how well the stories are going - which ones are just about finished, which ones are still a ways out, which ones are at risk and need extra attention. Everyone in the meeting should know where they can contribute to meeting the team's goals, and the PM and supervisor can get a feel for how the team is doing. And it's _fast_ because there's no pressure to provide a detailed report to justify your work.

For each story:
* The person most lately working on that story should give an update. It is completely ok to just say "I'm still working on this. I'm not blocked." or "The feature work is done but I'm cleaning up some tests" and leave it at that.
* If the update is more involved - say there is a block - that can be discussed _briefly_, or tabled for a post-standup discussion.
* The meeting leader can ask follow-up questions like: Is there a way for anyone else to pitch in on this story?
* The meeting leader should verify that Jira board reflects the current status of the story and its subtasks.
* If there is a need on a story - an extra set of eyes to help debug something, a code review, a round of dev testing - make sure there's a subtask to reflect that work, and if someone volunteers to help with it, assign the subtask to them.

After all the cards have been discussed, the meeting leader can ask follow-up questions like:

* Is anyone still looking for something to work on? (If yes, make sure they have something before the meeting adjourns)
* Does anyone have any schedule updates? (time away from work, today or soon)
* Is there anything else we need to talk about this morning? This is an invitation to discuss smaller items - issues brought up when talking about the stories, minor questions or discussions, or some knowledge share topic.

If everything is clicking along well, with no complications, this whole stand-up can be completed in 5-10 minutes for a group of 6 or 7 developers. I know this for a fact because my team regularly does this, to the point where our PM won't even bother to join the meeting if she's going to be more than 5 minutes late, because it'll probably be over.

If there is something big and gnarly going on, interested people can stay after the meeting to discuss, investigate, and solve problems, but that time is optional - if someone doesn't think they can contribute, doesn't think it's relevant to them, or just doesn't have time, they can bail and go about their day.

## Company Culture for Better Stand-Ups

1. Focus on the team's needs, not the manager's needs. Your manager should be able to look at your Jira board, listen to you talk through the stories, and understand what is going on well enough to manage. If they can't, look at finding a different way to get them the information they need.

2. Trust people to do what they are paid to do. There is no reason a developer should be required to give a blow-by-blow description of their work every day to someone who may or may not actually understand what it means. Instead, trust people to be working as efficiently as they can, and look for ways to motivate them towards the team's goals, the department's goals, and the company's goals.

3. Build trust between developers. The team needs to work _as a team_. Bad company culture will sink the best ideas, and things like stack ranking are custom-made to destroy teamwork.